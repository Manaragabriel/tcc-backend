<?php 
namespace App\Repositories\Call;
use App\Models\Calls;

class CallRepository implements ICallRepository{
    
    private $callModel;

    public function __construct(Calls $callModel){
        $this->callModel = $callModel;
    }

    public function getCall($call_id){
        return Calls::find($call_id);
    }
    public function getUserCalls($organization_id,$user_id){
        return Calls::where('user_id',$user_id)->where('organization_id',$organization_id)->paginate();
    }

    public function getOrganizationsCalls($organization_id){
        return Calls::where('organization_id',$organization_id)->paginate();
    }

    public static function getCallsBySlug($slug){
        return Calls::where('slug',$slug)->first();
    }

    public function storeCall($call){
        $this->callModel->fill($call);
        $this->callModel->save();
        return true;
    }
    public function updateCall($call, $oldCall){
        $oldCall->update($call);
        return true;
    }
    public function deleteCall($id){
        return $this->callModel->find($id)->delete();
    }

}

