package com.dynamic.mms.model.envest;

public class Enterprise {
    private Integer id;
    private long createdTime;
    private String name;
    private String statement;
    private String note;
    private String comment;
    private Integer campaignId;
    private Integer userId;

    public Enterprise(Integer id, long createdTime, String name, String statement, String note, String comment, Integer campaignId, Integer userId) {
        this.id = id;
        this.createdTime = createdTime;
        this.name = name;
        this.statement = statement;
        this.note = note;
        this.comment = comment;
        this.campaignId = campaignId;
        this.userId = userId;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public long getCreatedTime() {
        return createdTime;
    }

    public void setCreatedTime(long createdTime) {
        this.createdTime = createdTime;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getStatement() {
        return statement;
    }

    public void setStatement(String statement) {
        this.statement = statement;
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

    public Integer getCampaignId() {
        return campaignId;
    }

    public void setCampaignId(Integer campaignId) {
        this.campaignId = campaignId;
    }

    public Integer getUserId() {
        return userId;
    }

    public void setUserId(Integer userId) {
        this.userId = userId;
    }
}
