<?php 
	class ToDoController extends BaseController
	{
		public function getIndex()
		{
			$title = 'Todo\'s';
			$todos= array(
				'all' => Auth::user()->todos(),
				'todo' => Auth::user()->todos()->where('done',false)->get(),
				'done' => Auth::user()->todos()->where('done',true)->get()
				);
			return View::make('todos.index')->with(array('title' => $title, 'todos' => $todos));
		}
		public function addToDo()
		{
			$input = Input::all();

			$rules = array(
				'beschrijving' => 'required|min:3|max:150'
				);
			$messages = array(
				'beschrijving.required' => 'Je hebt geen beschrijving ingevuld',
				'beschrijving.min' => 'Je beschrijving moet min. 3 tekens bevatten',
				'beschrijving.max' => 'Je beschrijving mag max. 150 tekens bevatten'
				);
			$v = Validator::make($input,$rules,$messages);

			if($v->passes())
			{
				$todo = new Todo();
				$todo->beschrijving = $input['beschrijving'];
				$todo->user_id = Auth::id();
				$todo->done = false;
				$todo->save();
				return Redirect::to('/Todos');
			}
			else
			{
				return Redirect::to('/Todos')->withInput()->withErrors($v);
			}
		}
		public function changeToDone($todoId)
		{
			$todo = Todo::find($todoId);
			$todo->done = true;
			$todo->save();

			return Redirect::to('/Todos')->with('success','Allright, '.$todo->beschrijving.' is geschrapt!');
		}
		public function changeToTodo($todoId)
		{
			$todo = Todo::find($todoId);
			$todo->done = false;
			$todo->save();

			return Redirect::to('/Todos')->with('success','Oei terug meer werk, '.$todo->beschrijving.' is terug aan todo\'s toegevoegd!');
		}
		public function deleteTodo($todoId)
		{
			$todo = Todo::find($todoId);
			$todo->delete();

			return Redirect::to('/Todos')->with('success','De Todo: '.$todo->beschrijving.' werd successvol verwijderd!');
		}
	}
 ?>