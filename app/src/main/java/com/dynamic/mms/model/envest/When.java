package com.dynamic.mms.model.envest;

import com.dynamic.mms.model.Time;

public class When {
    private Integer id;
    private String note;
    private Integer planId;
    private Integer userId;
    private long time;
    private Time budgetedTime;
    private String startTime;
    private String endTime;
    private String objective;

    public When(Integer id, String note, Integer planId, Integer userId, long time, Time budgetedTime, String startTime, String endTime, String objective) {
        this.id = id;
        this.note = note;
        this.planId = planId;
        this.userId = userId;
        this.time = time;
        this.budgetedTime = budgetedTime;
        this.startTime = startTime;
        this.endTime = endTime;
        this.objective = objective;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getNote() {
        return note;
    }

    public void setNote(String note) {
        this.note = note;
    }

    public Integer getPlanId() {
        return planId;
    }

    public void setPlanId(Integer planId) {
        this.planId = planId;
    }

    public Integer getUserId() {
        return userId;
    }

    public void setUserId(Integer userId) {
        this.userId = userId;
    }

    public long getTime() {
        return time;
    }

    public void setTime(long time) {
        this.time = time;
    }

    public Time getBudgetedTime() {
        return budgetedTime;
    }

    public void setBudgetedTime(Time budgetedTime) {
        this.budgetedTime = budgetedTime;
    }

    public String getStartTime() {
        return startTime;
    }

    public void setStartTime(String startTime) {
        this.startTime = startTime;
    }

    public String getEndTime() {
        return endTime;
    }

    public void setEndTime(String endTime) {
        this.endTime = endTime;
    }

    public String getObjective() {
        return objective;
    }

    public void setObjective(String objective) {
        this.objective = objective;
    }
}
