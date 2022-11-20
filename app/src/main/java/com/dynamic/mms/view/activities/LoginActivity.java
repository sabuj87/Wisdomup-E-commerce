package com.dynamic.mms.view.activities;

import androidx.appcompat.app.AppCompatActivity;

import android.content.Intent;
import android.os.Bundle;
import android.util.Log;
import android.view.View;
import android.widget.Button;
import android.widget.EditText;
import android.widget.Toast;

import com.dynamic.mms.R;
import com.dynamic.mms.api.ApiClient;
import com.dynamic.mms.api.ApiService;
import com.dynamic.mms.model.User;
import com.dynamic.mms.response.AppResponse;
import com.dynamic.mms.service.BaseService;
import com.dynamic.mms.store.Save;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import org.json.JSONException;

import java.io.IOException;
import java.lang.reflect.Type;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class LoginActivity extends AppCompatActivity {
    private EditText username,password;
    private Button loginBtn;
    Gson gson = new Gson();
    Intent intent;
    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_login);
        username=findViewById(R.id.username);
        password=findViewById(R.id.password);
        loginBtn=findViewById(R.id.loginBtn);

        loginBtn.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                String usernameData=username.getText().toString().trim();
                String passwordData=password.getText().toString().trim();

                if(usernameData.isEmpty()){
                    username.setError("User name must filled up!");
                }else if(passwordData.isEmpty()){
                    password.setError("Enter password");
                }else if(password.length()<6){
                    password.setError("Password length must be 6");
                }else {

                    ApiService service = ApiClient.getInstance().create(ApiService.class);
                    Call<AppResponse> call = service.userAuthentication(new User(usernameData, passwordData));
                    call.enqueue(new Callback<AppResponse>() {
                        @Override
                        public void onResponse(Call<AppResponse> call, Response<AppResponse> response) {


                            if (response.isSuccessful()) {
                                AppResponse appResponse = response.body();
                               // String message = appResponse.getMessage();
                                String statusType = appResponse.getStatusType();

                                if(statusType.equals("success")){
                                    Type type1 = new TypeToken<User>() {
                                    }.getType();
                                    User user = gson.fromJson(appResponse.getData(), type1);
                                    //save
                                    new Save().saveUser(getApplicationContext(),user);

                                    intent=new Intent(LoginActivity.this,MainActivity.class);
                                    startActivity(intent);

                                }




                            }

                            if (!response.isSuccessful()) {
                                try {
                                    Toast.makeText(LoginActivity.this, BaseService.getMessage(response.errorBody().string()), Toast.LENGTH_SHORT).show();



                                } catch (JSONException | IOException e) {
                                    e.printStackTrace();
                                }
                            }
                        }

                        @Override
                        public void onFailure(Call<AppResponse> call, Throwable t) {

                            Toast.makeText(LoginActivity.this, t.getMessage(), Toast.LENGTH_SHORT).show();
                        }
                    });
                }
            }
        });




    }
}