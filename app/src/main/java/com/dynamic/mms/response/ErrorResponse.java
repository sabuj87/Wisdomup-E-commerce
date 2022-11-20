package com.dynamic.mms.response;

import com.google.gson.JsonObject;

public class ErrorResponse {

    private JsonObject body;

    public JsonObject getBody() {
        return body;
    }

    public void setBody(JsonObject body) {
        this.body = body;
    }
}
