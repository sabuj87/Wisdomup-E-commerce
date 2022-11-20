package com.dynamic.mms.apicall;

import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.widget.TextView;
import android.widget.Toast;

import com.dynamic.mms.R;
import com.dynamic.mms.api.ApiClient;
import com.dynamic.mms.api.ApiService;
import com.dynamic.mms.model.CurrentStatus;
import com.dynamic.mms.response.ApiResponse;
import com.dynamic.mms.response.AppResponse;
import com.dynamic.mms.service.BaseService;
import com.dynamic.mms.store.Save;
import com.dynamic.mms.view.activities.MainActivity;
import com.google.android.material.bottomsheet.BottomSheetDialog;
import com.google.gson.reflect.TypeToken;

import org.json.JSONException;

import java.io.IOException;
import java.lang.reflect.Type;

import retrofit2.Call;
import retrofit2.Callback;
import retrofit2.Response;

public class Apicall {
    private Context context;
    ApiService service = ApiClient.getInstance().create(ApiService.class);



    public Apicall(Context context) {
        this.context = context;
    }


    //All api call


    public void statusBarCall(){
        Call<AppResponse> call = service.statusBar(new Save().getUser(context).getAccessToken());
        getCallObject(call);
    }








    public  void getCallObject(Call<AppResponse> call){

          call.enqueue(new Callback<AppResponse>() {
              @Override
              public void onResponse(Call<AppResponse> call, Response<AppResponse> response) {


                  if (response.isSuccessful()) {
                    AppResponse    appResponse = response.body();

                      String statusType = appResponse.getStatusType();

                      if(statusType.equals("success")){


                      }




                  }


              }

              @Override
              public void onFailure(Call<AppResponse> call, Throwable t) {

              }
          });





      }
















}
