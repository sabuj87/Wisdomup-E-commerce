package com.dynamic.mms.model.project;

public class Project {
    private Integer id;
    private String createdTime;
    private String name;
    private String note;
    private Integer userId;
    private String userName;
    private String comment;
    private String statement;
    private Integer enterpriseId;
    private Type type;
    private String phases;
    private String investTimeList;
    private String totalTime;
    private String workTime;
    private String client;

    public Project(Integer id, String createdTime, String name, String note, Integer userId, String userName, String comment, String statement, Integer enterpriseId, Type type, String phases, String investTimeList, String totalTime, String workTime, String client) {
        this.id = id;
        this.createdTime = createdTime;
        this.name = name;
        this.note = note;
        this.userId = userId;
        this.userName = userName;
        this.comment = comment;
        this.statement = statement;
        this.enterpriseId = enterpriseId;
        this.type = type;
        this.phases = phases;
        this.investTimeList = investTimeList;
        this.totalTime = totalTime;
        this.workTime = workTime;
        this.client = client;
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

    public Integer getUserId() {
        return userId;
    }

    public void setUserId(Integer userId) {
        this.userId = userId;
    }

    public String getUserName() {
        return userName;
    }

    public void setUserName(String userName) {
        this.userName = userName;
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

    public Integer getEnterpriseId() {
        return enterpriseId;
    }

    public void setEnterpriseId(Integer enterpriseId) {
        this.enterpriseId = enterpriseId;
    }

    public Type getType() {
        return type;
    }

    public void setType(Type type) {
        this.type = type;
    }

    public String getPhases() {
        return phases;
    }

    public void setPhases(String phases) {
        this.phases = phases;
    }

    public String getInvestTimeList() {
        return investTimeList;
    }

    public void setInvestTimeList(String investTimeList) {
        this.investTimeList = investTimeList;
    }

    public String getTotalTime() {
        return totalTime;
    }

    public void setTotalTime(String totalTime) {
        this.totalTime = totalTime;
    }

    public String getWorkTime() {
        return workTime;
    }

    public void setWorkTime(String workTime) {
        this.workTime = workTime;
    }

    public String getClient() {
        return client;
    }

    public void setClient(String client) {
        this.client = client;
    }
}
