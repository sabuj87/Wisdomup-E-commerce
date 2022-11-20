package com.dynamic.mms.model.statusbar;

import com.dynamic.mms.model.Time;

public class StatusBar {
    private Integer userId;
    private String name;
    private Double progress;
    private Time ahead;
    private Time behind;
    private long aheadTime;
    private long behindTime;
    private Time spentTime;
    private Time remainTime;
    private Time scheduledTime;
    private String endTime;
    private String startTime;
    private Task task;

    public StatusBar(Integer userId, String name, Double progress, Time ahead, Time behind, long aheadTime, long behindTime, Time spentTime, Time remainTime, Time scheduledTime, String endTime, String startTime, Task task) {
        this.userId = userId;
        this.name = name;
        this.progress = progress;
        this.ahead = ahead;
        this.behind = behind;
        this.aheadTime = aheadTime;
        this.behindTime = behindTime;
        this.spentTime = spentTime;
        this.remainTime = remainTime;
        this.scheduledTime = scheduledTime;
        this.endTime = endTime;
        this.startTime = startTime;
        this.task = task;
    }

    public Integer getUserId() {
        return userId;
    }

    public void setUserId(Integer userId) {
        this.userId = userId;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public Double getProgress() {
        return progress;
    }

    public void setProgress(Double progress) {
        this.progress = progress;
    }

    public Time getAhead() {
        return ahead;
    }

    public void setAhead(Time ahead) {
        this.ahead = ahead;
    }

    public Time getBehind() {
        return behind;
    }

    public void setBehind(Time behind) {
        this.behind = behind;
    }

    public long getAheadTime() {
        return aheadTime;
    }

    public void setAheadTime(long aheadTime) {
        this.aheadTime = aheadTime;
    }

    public long getBehindTime() {
        return behindTime;
    }

    public void setBehindTime(long behindTime) {
        this.behindTime = behindTime;
    }

    public Time getSpentTime() {
        return spentTime;
    }

    public void setSpentTime(Time spentTime) {
        this.spentTime = spentTime;
    }

    public Time getRemainTime() {
        return remainTime;
    }

    public void setRemainTime(Time remainTime) {
        this.remainTime = remainTime;
    }

    public Time getScheduledTime() {
        return scheduledTime;
    }

    public void setScheduledTime(Time scheduledTime) {
        this.scheduledTime = scheduledTime;
    }

    public String getEndTime() {
        return endTime;
    }

    public void setEndTime(String endTime) {
        this.endTime = endTime;
    }

    public String getStartTime() {
        return startTime;
    }

    public void setStartTime(String startTime) {
        this.startTime = startTime;
    }

    public Task getTask() {
        return task;
    }

    public void setTask(Task task) {
        this.task = task;
    }
}
