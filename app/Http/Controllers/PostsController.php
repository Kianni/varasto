<?php

namespace App\Http\Controllers;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class PostsController extends Controller
{
    public function showAllPosts(Store $session)
    {
        $post = new Post();
        $posts = $post->getPosts($session);
        return view('posts.posts',['posts'=>$posts]);
    }
    public function getPost(Store $session, $id)
    {
        $post = new Post();
        $posts = $post->getPosts($session);
        $post = $post->getPostByKeyNumber($session, $id);
        
        return view('posts.post',['post'=>$post,'posts'=>$posts]);
        // $data=json_encode($post);
        // return "<h1>$data</h1>";
    }
    public function create()
    {
        return view('posts.create');
    }
    public function addPost(Store $session, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required'
        ]);

        $post = new Post();
        $post = $post->addPost($session, 
                                $request->input('id'),
                                $request->input('title'),
                                $request->input('content'));
        //$my_data=json_encode($request->all());
        //return "<h1>Post or not to post</h1><br><p> $my_data </p>>";
        return redirect('posts')->with('info','Post created successfully!');
    }
    public function changePost(Store $session, $keyNumber)
    {
        $post = new Post();
        $post = $post->getPostByKeyNumber($session,$keyNumber);
        return view('posts.edit',['post'=>$post, 'postId'=>$keyNumber]);
    }
    public function updatePost(Store $session, Request $request)
    {
        // $id = $request->input('id'); 
        // $title = $request->input('title'); 
        // $content = $request->input('content');

        $this->validate($request, [
            'title' => 'required|min:5',
            'content' => 'required'
        ]);
        
        $post = new Post();
        $post = $post->editPost($session, $request->input('id'),
                                            $request->input('title'),
                                            $request->input('content'),
                                            $request->input('placeNumberInArray'));
        //$id, $title,$content);
        
        return redirect('posts')->with('info','Post updated successfully!');

        // почему я могу изменять id
        // хотя в модели я не сохраняю изменения айди в переменной сешн
        // $my_data=json_encode($request->all());
        // return "<h1>Post or not to post</h1><br><p> $my_data </p>
        // <br><p>Post: $post </p><ul>
        // <li>$id</li>
        // <li>$title</li>
        // <li>$content</li>
        
        // </ul>";
        

        
        // почему он пустой выходит?
        //return view('posts.testing', ['post'=>$post]);
    }
}
