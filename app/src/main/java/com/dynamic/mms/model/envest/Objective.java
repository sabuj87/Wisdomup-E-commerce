package com.dynamic.mms.model.envest;

public class Objective {
    private  Integer id;
    private String name;
    private String note;
    private String comment;
    private String statement;
    private Integer phaseId;
    private Integer userId;
    private Integer resourceId;
    private String resourceName;
    private Integer objectiveTypeId;
    private String type;
    private Integer resourceRoleId;
    private String resourceRoleName;

    public Objective(Integer id, String name, String note, String comment, String statement, Integer phaseId, Integer userId, Integer resourceId, String resourceName, Integer objectiveTypeId, String type, Integer resourceRoleId, String resourceRoleName) {
        this.id = id;
        this.name = name;
        this.note = note;
        this.comment = comment;
        this.statement = statement;
        this.phaseId = phaseId;
        this.userId = userId;
        this.resourceId = resourceId;
        this.resourceName = resourceName;
        this.objectiveTypeId = objectiveTypeId;
        this.type = type;
        this.resourceRoleId = resourceRoleId;
        this.resourceRoleName = resourceRoleName;
    }

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
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

    public Integer getPhaseId() {
        return phaseId;
    }

    public void setPhaseId(Integer phaseId) {
        this.phaseId = phaseId;
    }

    public Integer getUserId() {
        return userId;
    }

    public void setUserId(Integer userId) {
        this.userId = userId;
    }

    public Integer getResourceId() {
        return resourceId;
    }

    public void setResourceId(Integer resourceId) {
        this.resourceId = resourceId;
    }

    public String getResourceName() {
        return resourceName;
    }

    public void setResourceName(String resourceName) {
        this.resourceName = resourceName;
    }

    public Integer getObjectiveTypeId() {
        return objectiveTypeId;
    }

    public void setObjectiveTypeId(Integer objectiveTypeId) {
        this.objectiveTypeId = objectiveTypeId;
    }

    public String getType() {
        return type;
    }

    public void setType(String type) {
        this.type = type;
    }

    public Integer getResourceRoleId() {
        return resourceRoleId;
    }

    public void setResourceRoleId(Integer resourceRoleId) {
        this.resourceRoleId = resourceRoleId;
    }

    public String getResourceRoleName() {
        return resourceRoleName;
    }

    public void setResourceRoleName(String resourceRoleName) {
        this.resourceRoleName = resourceRoleName;
    }
}

