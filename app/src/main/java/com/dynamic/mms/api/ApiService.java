package com.dynamic.mms.api;



import com.dynamic.mms.model.User;
import com.dynamic.mms.response.ApiResponse;
import com.dynamic.mms.response.AppResponse;

import retrofit2.Call;
import retrofit2.http.Body;
import retrofit2.http.GET;
import retrofit2.http.Header;
import retrofit2.http.POST;
import retrofit2.http.Path;

public interface ApiService {

    @POST("/api/authentications/login")
    Call<AppResponse> userAuthentication(@Body User user);
    @GET("/api/users")
    Call<ApiResponse> getAllUser(@Header("accessToken") String accessToken);
    @GET("/api/endeavors/status/current")
    Call<AppResponse> currentStatus(@Header("accessToken") String accessToken);
    @GET("/api/status-bar")
    Call<AppResponse> statusBar(@Header("accessToken") String accessToken);
    @GET("/api/projects?size=1000000")
    Call<ApiResponse> projects(@Header("accessToken") String accessToken);
    @GET("/api/invests/{id}/project")
    Call<ApiResponse> invests(@Header("accessToken") String accessToken,@Path("id")Integer projectId);
    @GET("/api/objectives/{id}/task")
    Call<ApiResponse> objectives(@Header("accessToken") String accessToken,@Path("id")Integer objectiveId);
}
