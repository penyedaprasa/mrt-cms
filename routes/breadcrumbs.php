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

// Home > Route
    // index
    Breadcrumbs::for('station.index', function ($trail) {
        $trail->parent('home');
        $trail->push('Station', route('station.index'));
    });
    // create
    Breadcrumbs::for('station.create', function ($trail) {
        $trail->parent('station.index');
        $trail->push('Create', route('station.create'));
    });
    // edit
    Breadcrumbs::for('station.edit', function ($trail, $data) {
        $trail->parent('station.index');
        $trail->push('Edit', route('station.edit', $data->id));
    });

// Home > Route
    // index
    Breadcrumbs::for('banner.index', function ($trail) {
        $trail->parent('home');
        $trail->push('Banner', route('banner.index'));
    });
    // create
    Breadcrumbs::for('banner.create', function ($trail) {
        $trail->parent('banner.index');
        $trail->push('Create', route('banner.create'));
    });
    // edit
    Breadcrumbs::for('banner.edit', function ($trail, $data) {
        $trail->parent('banner.index');
        $trail->push('Edit', route('banner.edit', $data->id));
    });

// Home > Route
    // index
    Breadcrumbs::for('holiday.index', function ($trail) {
        $trail->parent('home');
        $trail->push('holiday', route('holiday.index'));
    });
    // create
    Breadcrumbs::for('holiday.create', function ($trail) {
        $trail->parent('holiday.index');
        $trail->push('Create', route('holiday.create'));
    });
    // edit
    Breadcrumbs::for('holiday.edit', function ($trail, $data) {
        $trail->parent('holiday.index');
        $trail->push('Edit', route('holiday.edit', $data->id));
    });

// Home > Route
    // index
    Breadcrumbs::for('page.index', function ($trail) {
        $trail->parent('home');
        $trail->push('page', route('page.index'));
    });
    // create
    Breadcrumbs::for('page.create', function ($trail) {
        $trail->parent('page.index');
        $trail->push('Create', route('page.create'));
    });
    // edit
    Breadcrumbs::for('page.edit', function ($trail, $data) {
        $trail->parent('page.index');
        $trail->push('Edit', route('page.edit', $data->id));
    });



