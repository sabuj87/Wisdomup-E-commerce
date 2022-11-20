package com.dynamic.mms.store;

import android.content.Context;
import android.content.SharedPreferences;

import com.dynamic.mms.model.User;

public class Save {

    public  void  saveUser(Context context, User user){
        SharedPreferences sharedPreferences=context.getSharedPreferences("user",Context.MODE_PRIVATE);
        SharedPreferences.Editor editor=sharedPreferences.edit();
        editor.putString("firstName",user.getFirstName());
        editor.putString("lastName",user.getLastName());
        editor.putString("accessToken",user.getAccessToken());
        editor.putString("email",user.getEmail());
        editor.putString("username",user.getUsername());
        editor.putString("password",user.getPassword());
        editor.putString("createdTime",user.getCreatedTime());
        editor.apply();



    }


    public  User getUser(Context context){
        SharedPreferences sharedPreferences=context.getSharedPreferences("user",Context.MODE_PRIVATE);

        User user=new User(

                sharedPreferences.getString("firstName",null),
                sharedPreferences.getString("lastName",null),
                sharedPreferences.getString("accessToken",null),
                sharedPreferences.getString("email",null),
                sharedPreferences.getString("username",null),
                sharedPreferences.getString("password",null),
                sharedPreferences.getString("createdTime",null)

        );

        return user;


    }


}
