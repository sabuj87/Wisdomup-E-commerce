package com.dynamic.mms.response;

import com.google.gson.JsonArray;
import com.google.gson.annotations.SerializedName;

public class ApiResponse {

    @SerializedName("message")
    private String message;

    @SerializedName("status")
    private Integer status;

    @SerializedName("statusType")
    private String statusType;

    @SerializedName("data")
    private JsonArray data;

    public ApiResponse(String message, Integer status, String statusType, JsonArray data) {
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

    public JsonArray getData() {
        return data;
    }

    public void setData(JsonArray data) {
        this.data = data;
    }
}
