package com.dynamic.mms.view.fragments;

import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.util.Log;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.ArrayAdapter;
import android.widget.ListView;

import com.dynamic.mms.R;
import com.dynamic.mms.api.ApiClient;
import com.dynamic.mms.api.ApiService;
import com.dynamic.mms.model.envest.Task;
import com.dynamic.mms.model.project.Project;
import com.dynamic.mms.response.ApiResponse;
import com.dynamic.mms.store.Save;
import com.google.gson.Gson;
import com.google.gson.reflect.TypeToken;

import java.lang.reflect.Type;
import java.util.ArrayList;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;


public class TaskFragment extends Fragment {
    ApiService service = ApiClient.getInstance().create(ApiService.class);
    int objective_id=0;
    private ListView taskListView;
    private ArrayList<Task> tasks=new ArrayList<>();
    private ArrayList<String> taskNames=new ArrayList<>();
    private Gson gson = new Gson();

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {
        // Inflate the layout for this fragment
        View view=inflater.inflate(R.layout.fragment_task, container, false);
        taskListView=view.findViewById(R.id.taskList);

        objective_id=getArguments().getInt("invest_id");
        Log.d("inid",Integer.toString(objective_id));
        calObjective();

        return view;
    }

    private  void calObjective(){
        Call<ApiResponse> call = service.objectives(new Save().getUser(getContext()).getAccessToken(),objective_id);
        call.enqueue(new Callback<ApiResponse>() {
            @Override
            public void onResponse(Call<ApiResponse> call, Response<ApiResponse> response) {
                if (response.isSuccessful()) {
                    ApiResponse apiResponse = response.body();

                    String statusType = apiResponse.getStatusType();

                    if(statusType.equals("success")) {
                        tasks.clear();
                        Type type = new TypeToken<ArrayList<Task>>() {
                        }.getType();
                        tasks=gson.fromJson(apiResponse.getData().toString(), type);
                        if(!tasks.isEmpty()){
                          for (int i=0;i<tasks.size();i++){
                              taskNames.add(tasks.get(i).getName());
                          }
                            ArrayAdapter<String> arrayAdapter=new ArrayAdapter<String>(getContext(),android.R.layout.simple_list_item_1,taskNames);
                            taskListView.setAdapter(arrayAdapter);

                        }






                    }
                    }
            }

            @Override
            public void onFailure(Call<ApiResponse> call, Throwable t) {

            }
        });


    }
}