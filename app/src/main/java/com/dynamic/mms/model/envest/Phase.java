package com.dynamic.mms.model.envest;

public class Phase {
    private  Integer id;
    private  String createdTime;
    private  String name;
    private  String note;
    private  String comment;
    private  String statement;
    private  Integer projectId;
    private  Integer userId;
    private  String objectives;

    public Phase(Integer id, String createdTime, String name, String note, String comment, String statement, Integer projectId, Integer userId, String objectives) {
        this.id = id;
        this.createdTime = createdTime;
        this.name = name;
        this.note = note;
        this.comment = comment;
        this.statement = statement;
        this.projectId = projectId;
        this.userId = userId;
        this.objectives = objectives;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getCreatedTime() {
        return createdTime;
    }

    public void setCreatedTime(String createdTime) {
        this.createdTime = createdTime;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getNote() {
        return note;
    }

    public void setNote(String note) {
        this.note = note;
    }

    public String getComment() {
        return comment;
    }

    public void setComment(String comment) {
        this.comment = comment;
    }

    public String getStatement() {
        return statement;
    }

    public void setStatement(String statement) {
        this.statement = statement;
    }

    public Integer getProjectId() {
        return projectId;
    }

    public void setProjectId(Integer projectId) {
        this.projectId = projectId;
    }

    public Integer getUserId() {
        return userId;
    }

    public void setUserId(Integer userId) {
        this.userId = userId;
    }

    public String getObjectives() {
        return objectives;
    }

    public void setObjectives(String objectives) {
        this.objectives = objectives;
    }
}
