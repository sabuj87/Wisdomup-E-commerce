package com.dynamic.mms.service;



import com.dynamic.mms.constant.AppConstant;

import org.json.JSONException;
import org.json.JSONObject;

public class BaseService {

    public static String getMessage(String response) throws JSONException {
        JSONObject object = new JSONObject(response);
        JSONObject body = (JSONObject) object.get(AppConstant.ERROR);
        String message = (String) body.get(AppConstant.MESSAGE);
        return message;
    }
}
