<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;    

class baru extends Controller
{
    public function tampil_home(){
        return view('home', [
            'title' => 'Home',
        ]);
    }

    public function tampil_ichigo(){
        return view('ichigo', [
            'title' => 'Ichigo',
            'desc' => 'Near the very end of their life or death encounter,
            Yhwach is momentarily stopped by an arrow shot by Uryu, giving Ichigo
            the chance to strike Yhwach with Tensa Zangetsu. As the surface of the sword cracks,
            Ichigo hammers home a single strike with the Zangetsu that appears from within.'
        ]);
    }

    public function tampil_aizen(){
        return view('aizen', [
            'title' => 'Aizen',
            'desc' => 'Aizen was the captain of Squad 5 until
            he was found guilty of high treason and imprisoned in the Muken.
            Since the extent of his Spiritu al Pressure is unknown,
            Yhwach regards him as a special threat and dangerous force to be reckoned with.'
        ]);
    }

    public function tampil_yamamoto(){
        return view('yamamoto', [
            'title' => 'Yamamoto',
            'desc' => 'Since no one able to best him has appeared,
            Genryusai has been the Head Captain of the 13 Court Guard Squads for over a thousand years.
            He has unfinished business with Yhwach from the war between the Quincies
            and the Soul Reapers that began a thousand years prior.'
        ]);
    }

    public function tampil_yhwach(){
        return view('yhwach', [
            'title' => 'Yhwach',
            'desc' => 'Yhwach is the emperor of the Vandenreich,
            father to all Quincies,and invader of the Soul Society.
            He has the ability to look into the future,
            as well as powers of transformation and soul distribution.
            He and Genryusai have a history of hostility that dates back a thousand years.'
        ]);
    }

    public function tampil_shunsui(){
        return view('shunsui', [
            'title' => 'Shunsui',
            'desc' => 'Shunsui is promoted to Head Captain of the 13 Court Guard Squads
            after the death of Genryusai Yamamoto.He devises many plans to fight the Quincies,
            and he and Nanao fight together on the front lines, 
            with Shunsui even unleashing his Bankai.'
        ]);
    }
}

