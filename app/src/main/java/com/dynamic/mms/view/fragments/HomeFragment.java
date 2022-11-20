package com.dynamic.mms.view.fragments;

import android.os.Bundle;

import androidx.fragment.app.Fragment;

import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import com.dynamic.mms.R;


public class HomeFragment extends Fragment {
    private TextView investBtn;

    @Override
    public View onCreateView(LayoutInflater inflater, ViewGroup container,
                             Bundle savedInstanceState) {

       View view= inflater.inflate(R.layout.fragment_home, container, false);

       investBtn=view.findViewById(R.id.investBtn);
       investBtn.setOnClickListener(new View.OnClickListener() {
           @Override
           public void onClick(View view) {
               getFragmentManager().beginTransaction().replace(R.id.fgContainer,new InvestFragment()).commit();
           }
       });

       return  view;
    }
}