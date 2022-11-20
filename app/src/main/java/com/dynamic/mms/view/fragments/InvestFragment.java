package com.dynamic.mms.view.fragments;

import android.os.Bundle;

import androidx.fragment.app.Fragment;
import androidx.recyclerview.widget.LinearLayoutManager;
import androidx.recyclerview.widget.RecyclerView;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.AdapterView;
import android.widget.ArrayAdapter;
import android.widget.Spinner;
import android.widget.Toast;

import com.dynamic.mms.R;
import com.dynamic.mms.adapter.EnvestRVAdapter;
import com.dynamic.mms.api.ApiClient;
import com.dynamic.mms.api.ApiService;
import com.dynamic.mms.model.envest.Invest;
import com.dynamic.mms.model.project.Project;
import com.dynamic.mms.response.ApiResponse;
import com.dynamic.mms.response.AppResponse;
import com.dynamic.mms.store.Save;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import java.lang.reflect.Type;
import java.util.ArrayList;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class InvestFragment extends Fragment {
      private Spinner projectSpinner;
      private ArrayList<String> projectsName=new ArrayList<>();
      private ArrayList<Invest> invests=new ArrayList<>();
      private Gson gson = new Gson();
      private RecyclerView investRV;
    ApiService service = ApiClient.getInstance().create(ApiService.class);

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

        View view=inflater.inflate(R.layout.fragment_invest, container, false);
        projectSpinner=view.findViewById(R.id.projectSpinner);
        investRV=view.findViewById(R.id.envestRv);
        String[] projectList={
                "Raam Development Inc",
                "Raam Development Inc","Canarios Investments LLC","Ascent Team1"};

        callProject();
        return view;
    }


    private  void callProject(){


        Call<ApiResponse> call = service.projects(new Save().getUser(getContext()).getAccessToken());
        call.enqueue(new Callback<ApiResponse>() {
            @Override
            public void onResponse(Call<ApiResponse> call, Response<ApiResponse> response) {
                if (response.isSuccessful()) {
                    ApiResponse apiResponse = response.body();

                    String statusType = apiResponse.getStatusType();

                    if(statusType.equals("success")) {
                        Type type = new TypeToken<ArrayList<Project>>() {
                        }.getType();
                        ArrayList<Project> projects= gson.fromJson(apiResponse.getData().toString(), type);
                        for(int i=0;i<projects.size();i++){
                            projectsName.add(projects.get(i).getName());
                        }
                        ArrayAdapter<String> arrayAdapter=new ArrayAdapter<String>(getContext(),android.R.layout.simple_list_item_1,projectsName);

                        projectSpinner.setAdapter(arrayAdapter);


                        projectSpinner.setOnItemSelectedListener(new AdapterView.OnItemSelectedListener() {
                            @Override
                            public void onItemSelected(AdapterView<?> adapterView, View view, int i, long l) {
                                Call<ApiResponse> call = service.invests(new Save().getUser(getContext()).getAccessToken(),projects.get(i).getId());

                                call.enqueue(new Callback<ApiResponse>() {
                                    @Override
                                    public void onResponse(Call<ApiResponse> call, Response<ApiResponse> response) {
                                        ApiResponse apiResponse = response.body();

                                        String statusType = apiResponse.getStatusType();

                                        if(statusType.equals("success")) {
                                            invests.clear();
                                            Type type = new TypeToken<ArrayList<Invest>>() {
                                            }.getType();

                                            invests=gson.fromJson(apiResponse.getData().toString(), type);
                                            EnvestRVAdapter adapter=new EnvestRVAdapter(getContext(),invests);
                                            RecyclerView.LayoutManager layoutManager=new LinearLayoutManager(getContext());
                                            investRV.setLayoutManager(layoutManager);
                                            adapter.notifyDataSetChanged();
                                            investRV.setAdapter(adapter);






                                        }
                                    }

                                    @Override
                                    public void onFailure(Call<ApiResponse> call, Throwable t) {

                                    }
                                });



                            }

                            @Override
                            public void onNothingSelected(AdapterView<?> adapterView) {

                            }
                        });






                    }
                    }
            }

            @Override
            public void onFailure(Call<ApiResponse> call, Throwable t) {

            }
        });





    }
}