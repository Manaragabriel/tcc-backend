<form class="store_task">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Adicionar tarefa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label for="title">Título da tarefa</label>
                <input type="text" name="title" id="title" class="form-control"/>
            </div>

            <div class="form-group">
                <label for="title">Descrição da tarefa</label>
                <textarea type="text" name="description" id="description" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <label for="title">Responsável</label>
                <select type="text" name="user_id" id="user_id" class="form-control">
                    @foreach($members as $member)
                        <option value="{{$member->id}}">{{$member->name}}</option>
                    @endforeach
                </select>
            </div>
            
        </div>
        <div class="modal-footer">
            <button type="button" class="btn store_task_ajax btn-primary">Criar tarefa</button>
        </div>
      </form>