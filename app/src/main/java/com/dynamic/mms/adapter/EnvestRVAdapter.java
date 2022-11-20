package com.dynamic.mms.adapter;

import android.content.Context;
import android.os.Bundle;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.TextView;

import androidx.annotation.NonNull;
import androidx.appcompat.app.AppCompatActivity;
import androidx.fragment.app.Fragment;
import androidx.fragment.app.FragmentManager;
import androidx.recyclerview.widget.RecyclerView;

import com.dynamic.mms.R;
import com.dynamic.mms.model.envest.Invest;
import com.dynamic.mms.view.fragments.TaskFragment;

import java.util.ArrayList;
import java.util.List;

public class EnvestRVAdapter extends RecyclerView.Adapter<EnvestRVAdapter.viewHolder> {
    private Context context;
    private List<Invest> envestList;


    public EnvestRVAdapter(Context context, List<Invest> envestList) {
        this.context = context;
        this.envestList = envestList;
    }

    @NonNull
    @Override
    public EnvestRVAdapter.viewHolder onCreateViewHolder(@NonNull ViewGroup parent, int viewType) {
        LayoutInflater layoutInflater=LayoutInflater.from(context);
        View view=layoutInflater.inflate(R.layout.envest_rv_layout,parent,false);
        return new viewHolder(view);
    }

    @Override
    public void onBindViewHolder(@NonNull EnvestRVAdapter.viewHolder holder, int position) {
        StringBuilder stringBuilder=new StringBuilder();
        stringBuilder.append(envestList.get(position).getWhen().getBudgetedTime().getHour()+":");
        stringBuilder.append(envestList.get(position).getWhen().getBudgetedTime().getMinute()+":");
        stringBuilder.append(envestList.get(position).getWhen().getBudgetedTime().getSecond());


        holder.phase.setText(envestList.get(holder.getAdapterPosition()).getPhase().getName());
        holder.objective.setText(envestList.get(holder.getAdapterPosition()).getObjective().getName());
        holder.btime.setText(stringBuilder.toString());
        holder.endtime.setText(envestList.get(holder.getAdapterPosition()).getWhen().getEndTime());

        holder.itemView.setOnClickListener(new View.OnClickListener() {
            @Override
            public void onClick(View view) {
                AppCompatActivity activity = (AppCompatActivity) view.getContext();
                Fragment taskFragment = new TaskFragment();
                Bundle bundle = new Bundle();
                bundle.putInt("invest_id", envestList.get(holder.getAdapterPosition()).getObjective().getId());

                taskFragment.setArguments(bundle);


                activity.getSupportFragmentManager().beginTransaction().replace(R.id.fgContainer, taskFragment).addToBackStack(null).commit();


            }
        });




    }

    @Override
    public int getItemCount() {
        return envestList.size();
    }

    public class viewHolder extends RecyclerView.ViewHolder {
        private TextView phase,objective,btime,endtime;
        public viewHolder(@NonNull View itemView) {
            super(itemView);
            phase=itemView.findViewById(R.id.phase);
            objective=itemView.findViewById(R.id.objective);
            btime=itemView.findViewById(R.id.btime);
            endtime=itemView.findViewById(R.id.endtime);


        }
    }
}
