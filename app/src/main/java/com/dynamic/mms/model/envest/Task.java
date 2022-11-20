package com.dynamic.mms.model.envest;

public class Task {
    private Integer id;
    private String item;
    private String resource;
    private String name;
    private String time;
    private String note;
    private String comment;
    private String statement;
    private Integer objectiveId;
    private Integer userId;

    public Task(Integer id, String item, String resource, String name, String time, String note, String comment, String statement, Integer objectiveId, Integer userId) {
        this.id = id;
        this.item = item;
        this.resource = resource;
        this.name = name;
        this.time = time;
        this.note = note;
        this.comment = comment;
        this.statement = statement;
        this.objectiveId = objectiveId;
        this.userId = userId;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getItem() {
        return item;
    }

    public void setItem(String item) {
        this.item = item;
    }

    public String getResource() {
        return resource;
    }

    public void setResource(String resource) {
        this.resource = resource;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getTime() {
        return time;
    }

    public void setTime(String time) {
        this.time = time;
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

    public Integer getObjectiveId() {
        return objectiveId;
    }

    public void setObjectiveId(Integer objectiveId) {
        this.objectiveId = objectiveId;
    }

    public Integer getUserId() {
        return userId;
    }

    public void setUserId(Integer userId) {
        this.userId = userId;
    }
}
