package com.dynamic.mms.view.activities;

import androidx.annotation.NonNull;
import androidx.appcompat.app.ActionBarDrawerToggle;
import androidx.appcompat.app.AppCompatActivity;
import androidx.appcompat.widget.Toolbar;
import androidx.core.view.GravityCompat;
import androidx.drawerlayout.widget.DrawerLayout;
import androidx.fragment.app.FragmentContainerView;

import android.content.Intent;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.MenuItem;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

import com.dynamic.mms.R;
import com.dynamic.mms.api.ApiClient;
import com.dynamic.mms.api.ApiService;
import com.dynamic.mms.apicall.Apicall;
import com.dynamic.mms.model.CurrentStatus;
import com.dynamic.mms.model.User;
import com.dynamic.mms.model.statusbar.StatusBar;
import com.dynamic.mms.response.AppResponse;
import com.dynamic.mms.service.BaseService;
import com.dynamic.mms.store.Save;
import com.dynamic.mms.view.fragments.HomeFragment;
import com.google.android.material.bottomnavigation.BottomNavigationView;
import com.google.android.material.bottomsheet.BottomSheetDialog;
import com.google.android.material.navigation.NavigationView;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import org.json.JSONException;

import java.io.IOException;
import java.lang.reflect.Type;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class MainActivity extends AppCompatActivity {
    private DrawerLayout drawerLayout;
    private NavigationView navigationView;
    private Toolbar toolbar;
    Gson gson = new Gson();
    private BottomNavigationView bottomNavigationView;
    private TextView scheduledValue,remainValue,behind,ahed;
    private StringBuilder stringBuilder;
    private FragmentContainerView fragmentContainerView;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_main);
        toolbar=findViewById(R.id.toolbar);

        scheduledValue=findViewById(R.id.scheduledValue);
        remainValue=findViewById(R.id.remainValue);
        behind=findViewById(R.id.Behind);
        ahed=findViewById(R.id.aahed);
        fragmentContainerView=findViewById(R.id.fgContainer);
        getSupportFragmentManager().beginTransaction().replace(R.id.fgContainer,new HomeFragment()).commit();
        bottomNavigationView=findViewById(R.id.bottom_nav);
        statusBar();

        setSupportActionBar(toolbar);
        getSupportActionBar().setDisplayHomeAsUpEnabled(true);
        getSupportActionBar().setDisplayShowHomeEnabled(true);

        drawerLayout=findViewById(R.id.navDrawer);
        navigationView=findViewById(R.id.navigation_view_id);

        ActionBarDrawerToggle actionBarDrawerToggle=new ActionBarDrawerToggle(MainActivity.this,drawerLayout,toolbar,R.string.nav_drawer_open,R.string.nav_drawer_close);
        drawerLayout.addDrawerListener(actionBarDrawerToggle);

        actionBarDrawerToggle.syncState();

        actionBarDrawerToggle.setDrawerIndicatorEnabled(false);
        actionBarDrawerToggle.setHomeAsUpIndicator(R.drawable.ic_four_dot);
        actionBarDrawerToggle.setToolbarNavigationClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View v) {
                if (drawerLayout.isDrawerVisible(GravityCompat.START)) {
                    // drawerLayout.closeDrawer(GravityCompat.START);
                } else {
                    drawerLayout.openDrawer(GravityCompat.START);
                }
            }
        });


        bottomNavigationView.setOnNavigationItemSelectedListener(new BottomNavigationView.OnNavigationItemSelectedListener() {
            @Override
            public boolean onNavigationItemSelected(@NonNull MenuItem item) {
                if(item.getItemId()==R.id.status){
                    ApiService service = ApiClient.getInstance().create(ApiService.class);
                    Call<AppResponse> call = service.currentStatus(new Save().getUser(getApplicationContext()).getAccessToken());
                    call.enqueue(new Callback<AppResponse>() {
                        @Override
                        public void onResponse(Call<AppResponse> call, Response<AppResponse> response) {


                            if (response.isSuccessful()) {
                                AppResponse appResponse = response.body();
                                String message = appResponse.getMessage();
                                String statusType = appResponse.getStatusType();

                                if(statusType.equals("success")){
                                    Type type1 = new TypeToken<CurrentStatus>() {
                                    }.getType();
                                    CurrentStatus currentStatus = gson.fromJson(appResponse.getData(), type1);

                                    TextView purpose,mission,goal;
                                    BottomSheetDialog dialog = new BottomSheetDialog(MainActivity.this);
                                    LayoutInflater inflater = LayoutInflater.from(MainActivity.this);
                                    View view = inflater.inflate(R.layout.bottom_nav_layout, null);
                                    purpose=view.findViewById(R.id.purpose);
                                    mission=view.findViewById(R.id.mission);
                                    goal=view.findViewById(R.id.goal);

                                    purpose.setText("Purpose : "+currentStatus.getPurpose());
                                    mission.setText("Mission : "+currentStatus.getMission());
                                    goal.setText("Goal : "+currentStatus.getGoal());


                                    dialog.setContentView(view);
                                    dialog.show();


                                }




                            }

                            if (!response.isSuccessful()) {

                            }
                        }

                        @Override
                        public void onFailure(Call<AppResponse> call, Throwable t) {

                            Toast.makeText(MainActivity.this, t.getMessage(), Toast.LENGTH_SHORT).show();
                        }
                    });





                }
               return  true;
            }
        });



    }

    public  void statusBar(){
        ApiService service = ApiClient.getInstance().create(ApiService.class);
        Call<AppResponse> call = service.statusBar(new Save().getUser(getApplicationContext()).getAccessToken());
        call.enqueue(new Callback<AppResponse>() {
            @Override
            public void onResponse(Call<AppResponse> call, Response<AppResponse> response) {


                if (response.isSuccessful()) {
                    AppResponse    appResponse = response.body();

                    String statusType = appResponse.getStatusType();

                    if(statusType.equals("success")){
                        Type type1 = new TypeToken<StatusBar>() {
                        }.getType();
                        StatusBar statusBar = gson.fromJson(appResponse.getData(), type1);
                        stringBuilder=new StringBuilder();
                        stringBuilder.append(statusBar.getScheduledTime().getHour()+":");
                        stringBuilder.append(statusBar.getScheduledTime().getMinute()+":");
                        stringBuilder.append(statusBar.getScheduledTime().getSecond());

                        scheduledValue.setText(stringBuilder.toString());


                        stringBuilder=new StringBuilder();
                        stringBuilder.append(statusBar.getRemainTime().getHour()+":");
                        stringBuilder.append(statusBar.getRemainTime().getMinute()+":");
                        stringBuilder.append(statusBar.getRemainTime().getSecond());

                        remainValue.setText("REMAIN : "+stringBuilder.toString());


                        stringBuilder=new StringBuilder();
                        stringBuilder.append(statusBar.getBehind().getHour()+":");
                        stringBuilder.append(statusBar.getBehind().getMinute()+":");
                        stringBuilder.append(statusBar.getBehind().getSecond());
                        behind.setText( "BEHIND SCHEDULE : "+stringBuilder.toString());


                        stringBuilder=new StringBuilder();
                        stringBuilder.append(statusBar.getAhead().getHour()+":");
                        stringBuilder.append(statusBar.getAhead().getMinute()+":");
                        stringBuilder.append(statusBar.getAhead().getSecond());
                        ahed.setText("AHEAD OF SCHEDULE : "+stringBuilder.toString());
















                    }




                }


            }

            @Override
            public void onFailure(Call<AppResponse> call, Throwable t) {

            }
        });



    }
}