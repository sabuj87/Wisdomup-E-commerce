package com.dynamic.mms.response;

import com.google.gson.JsonObject;
import com.google.gson.annotations.SerializedName;

public class AppResponse {

    @SerializedName("message")
    private String message;

    @SerializedName("status")
    private Integer status;

    @SerializedName("statusType")
    private String statusType;

    @SerializedName("data")
    private JsonObject data;

    public AppResponse(String message, Integer status, String statusType, JsonObject data) {
        this.message = message;
        this.status = status;
        this.statusType = statusType;
        this.data = data;
    }

    public String getMessage() {
        return message;
    }

    public void setMessage(String message) {
        this.message = message;
    }

    public Integer getStatus() {
        return status;
    }

    public void setStatus(Integer status) {
        this.status = status;
    }

    public String getStatusType() {
        return statusType;
    }

    public void setStatusType(String statusType) {
        this.statusType = statusType;
    }

    public JsonObject getData() {
        return data;
    }

    public void setData(JsonObject data) {
        this.data = data;
    }
}
