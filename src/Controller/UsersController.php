<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 */
class UsersController extends AppController
{
	public function beforeFilter(\Cake\Event\Event $event)
	{
		parent::beforeFilter($event);
		$this->Auth->allow(['add']);
	}

	public function isAuthorized($user)
	{
		if(isset($user['role']) and $user['role'] === 'user') {
			if(in_array($this->request->action, ['home', 'view', 'logout'])) {
				return true;
			}
		}

		return parent::isAuthorized($user);
	}

	public function index()
	{
		$users = $this->paginate($this->Users);
		$this->set('users', $users);
	}

	public function view($id) {
		$user = $this->Users->get($id);
		$this->set('user',$user);
	}

	public function add()
	{
		$user = $this->Users->newEntity();

		if($this->request->is('post')) {
			$user = $this->Users->patchEntity($user, $this->request->data);

			$user->role = 'user';
			$user->active = 1;

			if ($this->Users->save($user)) {
				$this->Flash->success('El usuario ha sido creado correctamente.');
				return $this->redirect(['controller' => 'Users', 'action' => 'login']);
			}
			else {
				$this->Flash->error('El usuario no pudo ser creado, por favor reintente.');
			}
		}
		$this->set(compact('user'));
	}

	public function login() {
		if($this->request->is('post')) {
			$user = $this->Auth->identify();
			if($user) {
				$this->Auth->setUser($user);
				return $this->redirect($this->Auth->redirectUrl());
			}
			else {
				$this->Flash->error('Datos inválidos, por favor reintente', ['key' => 'auth']);
			}
		}

		if($this->Auth->user()) {
			return $this->redirect(['controller' => 'Users', 'action' => 'home']);
		}
	}

	public function home()
	{
		$this->render();
	}

	public function logout()
	{
		return $this->redirect($this->Auth->logout());
	}

	public function edit($id = null)
	{
		$user = $this->Users->get($id);

		if($this->request->is(['patch', 'post', 'put'])) {
			$user = $this->Users->patchEntity($user, $this->request->data);
			if($this->Users->save($user)) {
				$this->Flash->success('El usuario ha sido modificado');
				return $this->redirect(['action' => 'index']);
			}
			else {
				$this->Flash->error('No se pudo modificar el usuario');
			}
		}

		$this->set(compact('user'));
	}

	public function delete($id = null)
	{
		$this->request->allowMethod(['post', 'delete']);
		$user = $this->Users->get($id);

		if($this->Users->delete($user)) {
			$this->Flash->success('El usuario #' . $id . ' ha sido eliminado.');
		}
		else {
			$this->Flash->error('Error al eliminar al usuario #' . $id . ', por favor reintente.');
		}

		return $this->redirect(['action' =>'index']);
	}
}
