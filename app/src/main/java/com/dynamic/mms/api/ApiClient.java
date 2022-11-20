package com.dynamic.mms.api;

import com.dynamic.mms.constant.AppConstant;

import java.util.Objects;

import retrofit2.Retrofit;
import retrofit2.converter.gson.GsonConverterFactory;

public class ApiClient {

    private static Retrofit retrofit;

    public static Retrofit getInstance() {
        if (Objects.isNull(retrofit)) {
            retrofit = new Retrofit.Builder()
                    .baseUrl(AppConstant.API_URL)
                    .addConverterFactory(GsonConverterFactory.create())
                    .build();
        }

        return retrofit;
    }
}
