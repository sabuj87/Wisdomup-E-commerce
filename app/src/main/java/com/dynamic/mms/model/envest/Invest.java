package com.dynamic.mms.model.envest;

import com.dynamic.mms.model.Time;

public class Invest {

    private Integer id;
    private Double cost;
    private String note;
    private Time time;
    private Time planTime;
    private double progress;
    private Integer plan;
    private String percentage;
    private String endTime;
    private String startTime;
    private Campaign campaign;
    private Enterprise enterprise;
    private Project project;
    private Phase phase;
    private Objective objective;
    private String record;
    private Task task;
    private When when;

    public Invest(Integer id, Double cost, String note, Time time, Time planTime, double progress, Integer plan, String percentage, String endTime, String startTime, Campaign campaign, Enterprise enterprise, Project project, Phase phase, Objective objective, String record, Task task, When when) {
        this.id = id;
        this.cost = cost;
        this.note = note;
        this.time = time;
        this.planTime = planTime;
        this.progress = progress;
        this.plan = plan;
        this.percentage = percentage;
        this.endTime = endTime;
        this.startTime = startTime;
        this.campaign = campaign;
        this.enterprise = enterprise;
        this.project = project;
        this.phase = phase;
        this.objective = objective;
        this.record = record;
        this.task = task;
        this.when = when;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public Double getCost() {
        return cost;
    }

    public void setCost(Double cost) {
        this.cost = cost;
    }

    public String getNote() {
        return note;
    }

    public void setNote(String note) {
        this.note = note;
    }

    public Time getTime() {
        return time;
    }

    public void setTime(Time time) {
        this.time = time;
    }

    public Time getPlanTime() {
        return planTime;
    }

    public void setPlanTime(Time planTime) {
        this.planTime = planTime;
    }

    public double getProgress() {
        return progress;
    }

    public void setProgress(double progress) {
        this.progress = progress;
    }

    public Integer getPlan() {
        return plan;
    }

    public void setPlan(Integer plan) {
        this.plan = plan;
    }

    public String getPercentage() {
        return percentage;
    }

    public void setPercentage(String percentage) {
        this.percentage = percentage;
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

    public Campaign getCampaign() {
        return campaign;
    }

    public void setCampaign(Campaign campaign) {
        this.campaign = campaign;
    }

    public Enterprise getEnterprise() {
        return enterprise;
    }

    public void setEnterprise(Enterprise enterprise) {
        this.enterprise = enterprise;
    }

    public Project getProject() {
        return project;
    }

    public void setProject(Project project) {
        this.project = project;
    }

    public Phase getPhase() {
        return phase;
    }

    public void setPhase(Phase phase) {
        this.phase = phase;
    }

    public Objective getObjective() {
        return objective;
    }

    public void setObjective(Objective objective) {
        this.objective = objective;
    }

    public String getRecord() {
        return record;
    }

    public void setRecord(String record) {
        this.record = record;
    }

    public Task getTask() {
        return task;
    }

    public void setTask(Task task) {
        this.task = task;
    }

    public When getWhen() {
        return when;
    }

    public void setWhen(When when) {
        this.when = when;
    }
}
