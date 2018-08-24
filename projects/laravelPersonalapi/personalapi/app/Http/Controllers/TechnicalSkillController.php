<?php

namespace App\Http\Controllers;
use Illuminate\Http\Requests;
use App\TechnicalSkill;
use App\Http\Resources\TechnicalSkill as TechnicalSkillResource;

use Illuminate\Http\Request;

class TechnicalSkillController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TechnicalSkillResource::collection(TechnicalSkill::all());
    }  
}