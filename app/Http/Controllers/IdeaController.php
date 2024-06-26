<?php

namespace App\Http\Controllers;

use App\Models\Idea;
use Illuminate\Http\Request;

class IdeaController extends Controller
{
    public function show(Idea $idea){

        return view("ideas.show",compact('idea')); //use compact to find variable name idea and create assoc arr automatically.
    }

    public function store(){

        request()->validate([
            'content' => 'required|min:10|max:255' //validation rule
        ]);

        $idea = Idea::create( //accessing the Idea model and creating idea data
            [
            'content'=> request()->get('content','')
            ]
        );
        return redirect()->route('dashboard')->with('success','Idea is created successfully!'); //redirect to dashboard route page
    }

    public function destroy(Idea $idea){

        $idea->delete();

        //to delete a data with the help id;
        // Idea::where('id',$id)->firstOrFail()->delete();
        //firstOrFail to show a error404 if user try to delete a already deleted data

        return redirect()->route('dashboard')->with('success','successfully forgotten!');
    }

    public function edit(Idea $idea){

        $editing = true;

        return view("ideas.show",compact('idea','editing'));
    }

    public function update(Idea $idea){

        request()->validate([
            'content' => 'required|min:10|max:255'
        ]);

        $idea->content = request()->get('content','');
        $idea->save();

        return redirect()->route('ideas.show',$idea->id)->with('success',"Successfully Updated!!");
    }
}
