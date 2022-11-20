package com.dynamic.mms.model.project;

public class Type {
    private  Integer id;
    private  String name;
    private  String code;
    private  Boolean archive;


    public Type(Integer id, String name, String code, Boolean archive) {
        this.id = id;
        this.name = name;
        this.code = code;
        this.archive = archive;
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

    public String getCode() {
        return code;
    }

    public void setCode(String code) {
        this.code = code;
    }

    public Boolean getArchive() {
        return archive;
    }

    public void setArchive(Boolean archive) {
        this.archive = archive;
    }
}
