package com.dynamic.mms.model.statusbar;

public class Task {
  private   String id ;
  private   String item ;
  private   String resource ;
  private   String name ;
  private   long time ;
  private   String note;
  private   String comment;
  private   String statement;
  private   String objectiveId;
  private   String userId;

    public Task(String id, String item, String resource, String name, long time, String note, String comment, String statement, String objectiveId, String userId) {
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

    public String getId() {
        return id;
    }

    public void setId(String id) {
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

    public long getTime() {
        return time;
    }

    public void setTime(long time) {
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

    public String getObjectiveId() {
        return objectiveId;
    }

    public void setObjectiveId(String objectiveId) {
        this.objectiveId = objectiveId;
    }

    public String getUserId() {
        return userId;
    }

    public void setUserId(String userId) {
        this.userId = userId;
    }
}
