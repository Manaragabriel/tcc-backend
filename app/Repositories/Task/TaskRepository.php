<?php 
namespace App\Repositories\Task;
use App\Models\Tasks;

class TaskRepository implements ITaskRepository{
    
    private $taskModel;

    public function __construct(Tasks $taskModel){
        $this->taskModel = $taskModel;
    }

    public static function find($task_id){
        return Tasks::find($task_id);
    }

    public function getByStatus($status,$project_id){
        return $this->taskModel->where('status',$status)->where('project_id',$project_id)->get();
      
    }
    public function getByUser($user_id){
        return $this->taskModel->with('project')->where('user_id',$user_id)->paginate();
      
    }

    public function storeTask($task){
        $this->taskModel->fill($task);
        $this->taskModel->save();
        return true;
    }

    public function updateTask($task,$oldTask){
        $oldTask->update($task);
        return true;
    }

    public function updateTaskStatus($id, $status){
        $this->taskModel->where('id',$id)->update(['status' => $status]);
        return true;
    }

    public function deleteTask($id){
        return $this->taskModel->find($id)->delete();
    }
}

