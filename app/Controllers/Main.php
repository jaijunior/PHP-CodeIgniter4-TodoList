<?php

namespace App\Controllers;
use CodeIgniter\Controller;

class Main extends Controller
{
    public function index()
    {   
        $data['jobs'] = $this->getAllJobs();
        return view('home', $data);
    }

    public function newJob()
    {
        return view('newJob');
    }
    public function newJobSubmition()
    {
        if(!$_SERVER['REQUEST_METHOD'] == 'POST'){
            return redirect()->to(site_url('main'));
        }
        $job = $this->request->getPost('job_name');

        //guardar na base de dados;
        $params = [
            'job' => $job
        ];
        $db = db_connect();
        $db->query("INSERT INTO jobs(job,datetime_created) VALUES (:job:, NOW())", $params);
        $db->close();

        //redirecionar para pagina inicial
        return redirect()->to(site_url('main'));
    }

    public function jobDone($id_job = -1){

        $params = [
           'id_job' => $id_job
        ];
        
        $db = db_connect();
        $db->query("UPDATE jobs SET datetime_finished = NOW(), datetime_updated = NOW() WHERE id_jobs = :id_job:",$params);
        $db->close();

        return redirect()->to(site_url('main'));

    }

    public function editJob($id_job = -1){
        
        //Carregar dados da terefa
        $params = [
            'id_job' => $id_job
        ];

        $db = db_connect();
        $dados = $db->query("SELECT * FROM jobs where id_jobs = :id_job:",$params)->getResultObject();
        $db->close();

        $data['job'] = $dados[0];
        return view('editJob',$data);
    }

    public function editJobSubmition(){

        if(!$_SERVER['REQUEST_METHOD'] == 'POST'){
            return redirect()->to(site_url('main'));
        }
        $id_job = $this->request->getPost('id_job');
        $job = $this->request->getPost('job_name');
        
        //atualizar dados do DB
        $params = [
            'id_job' => $id_job,
            'job' => $job
        ];

        $db = db_connect();
        $db->query("UPDATE jobs SET job = :job:, datetime_updated = NOW() WHERE id_jobs = :id_job:", $params);
        $db->close();

        return redirect()->to(site_url('main'));
    }

    public function deleteJob($id_job = -1){
        $params = [
            'id_job' => $id_job
        ];
        
        $db = db_connect();
        $data ['job'] = $db->query("SELECT * FROM jobs WHERE id_jobs = :id_job:", $params)->getResultObject()[0];
        $db->close();

        return view('deleteJob', $data);
    }

    public function deleteJobSubmition($id_job = -1){
        $params = [
            'id_job' => $id_job
        ];
        
        $db = db_connect() ;
        $db->query("DELETE FROM jobs WHERE id_jobs = :id_job:", $params);
        $db->close();

        return redirect()->to(site_url('main'));
    }

    private function getAllJobs()
    {
        $db = db_connect();

            $dados = $db->query("SELECT * FROM jobs")->getResultObject();

        $db->close();

        return $dados;
    }
}
