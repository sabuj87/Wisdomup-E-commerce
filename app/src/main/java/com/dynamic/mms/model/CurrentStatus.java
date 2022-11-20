package com.dynamic.mms.model;

public class CurrentStatus {


    private String purpose;
    private String mission;
    private String goal;
    private String campaign;
    private String enterprise;
    private String project;
    private String phase;
    private String objective;
    private String task;

    public CurrentStatus(String purpose, String mission, String goal, String campaign, String enterprise, String project, String phase, String objective, String task) {
        this.purpose = purpose;
        this.mission = mission;
        this.goal = goal;
        this.campaign = campaign;
        this.enterprise = enterprise;
        this.project = project;
        this.phase = phase;
        this.objective = objective;
        this.task = task;
    }


    public String getPurpose() {
        return purpose;
    }

    public void setPurpose(String purpose) {
        this.purpose = purpose;
    }

    public String getMission() {
        return mission;
    }

    public void setMission(String mission) {
        this.mission = mission;
    }

    public String getGoal() {
        return goal;
    }

    public void setGoal(String goal) {
        this.goal = goal;
    }

    public String getCampaign() {
        return campaign;
    }

    public void setCampaign(String campaign) {
        this.campaign = campaign;
    }

    public String getEnterprise() {
        return enterprise;
    }

    public void setEnterprise(String enterprise) {
        this.enterprise = enterprise;
    }

    public String getProject() {
        return project;
    }

    public void setProject(String project) {
        this.project = project;
    }

    public String getPhase() {
        return phase;
    }

    public void setPhase(String phase) {
        this.phase = phase;
    }

    public String getObjective() {
        return objective;
    }

    public void setObjective(String objective) {
        this.objective = objective;
    }

    public String getTask() {
        return task;
    }

    public void setTask(String task) {
        this.task = task;
    }
}


