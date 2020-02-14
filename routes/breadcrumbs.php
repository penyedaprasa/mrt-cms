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


// Home > Route
    // index
    Breadcrumbs::for('route.index', function ($trail) {
        $trail->parent('home');
        $trail->push('Route', route('route.index'));
    });
    // create
    Breadcrumbs::for('route.create', function ($trail) {
        $trail->parent('route.index');
        $trail->push('Create', route('route.create'));
    });
    // edit
    Breadcrumbs::for('route.edit', function ($trail, $data) {
        $trail->parent('route.index');
        $trail->push('Edit', route('route.edit', $data->id));
    });

// Home > Route
    // index
    Breadcrumbs::for('bannertext.index', function ($trail) {
        $trail->parent('home');
        $trail->push('Banner Text', route('bannertext.index'));
    });
    // create
    Breadcrumbs::for('bannertext.create', function ($trail) {
        $trail->parent('bannertext.index');
        $trail->push('Create', route('bannertext.create'));
    });
    // edit
    Breadcrumbs::for('bannertext.edit', function ($trail, $data) {
        $trail->parent('bannertext.index');
        $trail->push('Edit', route('bannertext.edit', $data->id));
    });



