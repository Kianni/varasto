<?php


namespace App;
class Post{
    public function getPosts($session)
    {
        if(!$session->has('posts'))
        {
            $this->dummyData($session);
        }
        return $session->get('posts');
    }
    public function getPostByKeyNumber($session, $keyNumber)
    {
        if(!$session->has('posts'))
        {
            $this->dummyData($session);
        }
        return $session->get('posts')[$keyNumber];
    }
    public function addPost($session, $id, $title, $content)
    {
        
        $posts = $session->get('posts');
        array_push($posts,['id'=>$id, 'title'=>$title,'content'=>$content]);
        $session->put('posts',$posts);
    }
    public function editPost($session, $id, $title, $content, $placeNumberInArray)
    {
        $posts = $session->get('posts');
        
        // изменение поста в переменной сешн происходит здесь!!!!или не ПРОИСХОДИТы
        $posts[$placeNumberInArray]=['id'=>$id,'title'=>$title,'content'=>$content];
        $session->put('posts',$posts);
        // далее контроллер просто выводит все посты из переменной сешн
    }
    private function dummyData($session)
    {
        $posts = [
            [   'id'=>'10',
                'title'=>'Logis 220',
                'content'=>'yksiote keittiöhana pesukoneventtiilillä'],
            [   'id'=>'11',
                'title'=>'Panasonic NE9 PKE-1 CS CU Nordic Inveteron',
                'content'=>'sisäilmaa puhdistava ja lämpötilaa säätelevä ilmalämpöpumppu'],
            [   'id'=>'12',
                'title'=>'Franke Rotondo',
                'content'=>'kodinhoitohuoneen allas! Halkaisija 42cm, hinta sisältää pohjaventtiilin'],
            [   'id'=>'13',
                'title'=>'Design lattiakaivon kansi ruostumattomasta teräksestä',
                'content'=>'Pyöreä, 150mm halkaisija mm. Merikan lattiakaivon kansistoon sopiva']
        ];
        $session->put('posts',$posts);
    }
}