<?php 
namespace App\Repositories\Task;
use App\Models\Tasks;

class TaskRepository implements ITaskRepository{
    
    private $taskModel;

    public function __construct(Tasks $taskModel){
        $this->taskModel = $taskModel;
    }

    public function getByStatus($status,$project_id){
        return $this->taskModel->where('status',$status)->where('project_id',$project_id)->get();
      
    }

    public function storeTask($task){
        $this->taskModel->fill($task);
        $this->taskModel->save();
        return true;
    }

    public function deleteTask($id){
        return $this->taskModel->find($id)->delete();
    }
}

