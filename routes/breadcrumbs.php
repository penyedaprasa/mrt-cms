<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('dashboard.index'));
});

// Home > Train
    // index
    Breadcrumbs::for('train.index', function ($trail) {
        $trail->parent('home');
        $trail->push('Train', route('train.index'));
    });
    // create
    Breadcrumbs::for('train.create', function ($trail) {
        $trail->parent('train.index');
        $trail->push('Create', route('train.create'));
    });
    // edit
    Breadcrumbs::for('train.edit', function ($trail, $data) {
        $trail->parent('train.index');
        $trail->push('Edit', route('train.edit', $data->id));
    });


// Home > Blog > [Category]
Breadcrumbs::for('category', function ($trail, $category) {
    $trail->parent('blog');
    $trail->push($category->title, route('category', $category->id));
});

// Home > Blog > [Category] > [Post]
Breadcrumbs::for('post', function ($trail, $post) {
    $trail->parent('category', $post->category);
    $trail->push($post->title, route('post', $post->id));
});



