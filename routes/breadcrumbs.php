<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Home > About
Breadcrumbs::register('about', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('About', route('about'));
});

// Home > Profile
Breadcrumbs::register('profile', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Profile', route('profile'));
});

// Home > Blog
Breadcrumbs::register('blog', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Blog', route('blog'));
});

// Home > Contact
Breadcrumbs::register('contact', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Contact', route('contact'));
});

// Change Password
Breadcrumbs::register('change_password', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Ubah Password', route('change_password'));
});

// Home > Surat Keluar
Breadcrumbs::register('surat-keluar.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Surat Keluar', route('surat-keluar.index'));
});

// Home > Surat Keluar > [Surat-Keluar]
Breadcrumbs::register('surat-keluar.show', function($breadcrumbs, $slug)
{
    $breadcrumbs->parent('surat-keluar.index');
    $breadcrumbs->push($slug, route('surat-keluar.show', $slug));
});

// Home > Surat Keluar > Create
Breadcrumbs::register('surat-keluar.create', function($breadcrumbs)
{
    $breadcrumbs->parent('surat-keluar.index');
    $breadcrumbs->push('Create Surat Keluar', route('surat-keluar.create'));
});

// Home > Edit Surat Keluar > [Surat-Keluar]
Breadcrumbs::register('surat-keluar.edit', function($breadcrumbs, $slug)
{
    $breadcrumbs->parent('surat-keluar.index');
    $breadcrumbs->push('Edit Surat Keluar', route('surat-keluar.edit', $slug));
});

// Home > Persetujuan Surat Keluar
Breadcrumbs::register('persetujuan-surat-keluar.index', function($breadcrumbs)
{
    $breadcrumbs->parent('surat-keluar.index');
    $breadcrumbs->push('Persetujuan Surat Keluar', route('persetujuan-surat-keluar.index'));
});


// Home > Surat Masuk
Breadcrumbs::register('surat-masuk.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Surat Masuk', route('surat-masuk.index'));
});

// Home > Surat Masuk > [Surat-Masuk]
Breadcrumbs::register('surat-masuk.show', function($breadcrumbs, $slug)
{
    $breadcrumbs->parent('surat-masuk.index');
    $breadcrumbs->push($slug, route('surat-masuk.show', $slug));
});

// Home > Surat Masuk > Create
Breadcrumbs::register('surat-masuk.create', function($breadcrumbs)
{
    $breadcrumbs->parent('surat-masuk.index');
    $breadcrumbs->push('Create Surat Masuk', route('surat-masuk.create'));
});

// Home > Edit Surat Masuk > [Surat-Masuk]
Breadcrumbs::register('surat-masuk.edit', function($breadcrumbs, $slug)
{
    $breadcrumbs->parent('surat-masuk.index');
    $breadcrumbs->push('Edit Surat Masuk', route('surat-masuk.edit', $slug));
});

// Home > Divisi
Breadcrumbs::register('divisi.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Divisi', route('divisi.index'));
});

// Home > Divisi > [Divisi]
Breadcrumbs::register('divisi.show', function($breadcrumbs, $slug)
{
    $breadcrumbs->parent('divisi.index');
    $breadcrumbs->push($slug, route('divisi.show', $slug));
});

// Home > Divisi > Create
Breadcrumbs::register('divisi.create', function($breadcrumbs)
{
    $breadcrumbs->parent('divisi.index');
    $breadcrumbs->push('Create Divisi', route('divisi.create'));
});

// Home > Edit Divisi > [Divisi]
Breadcrumbs::register('divisi.edit', function($breadcrumbs, $slug)
{
    $breadcrumbs->parent('divisi.index');
    $breadcrumbs->push('Edit Divisi', route('divisi.edit', $slug));
});

// Home > Pegawai
Breadcrumbs::register('pegawai.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Pegawai', route('pegawai.index'));
});

// Home > Pegawai > [Pegawai]
Breadcrumbs::register('pegawai.show', function($breadcrumbs, $slug)
{
    $breadcrumbs->parent('pegawai.index');
    $breadcrumbs->push($slug, route('pegawai.show', $slug));
});

// Home > Pegawai > Create
Breadcrumbs::register('pegawai.create', function($breadcrumbs)
{
    $breadcrumbs->parent('pegawai.index');
    $breadcrumbs->push('Create Pegawai', route('pegawai.create'));
});

// Home > Edit Pegawai > [Pegawai]
Breadcrumbs::register('pegawai.edit', function($breadcrumbs, $slug)
{
    $breadcrumbs->parent('pegawai.index');
    $breadcrumbs->push('Edit Pegawai', route('pegawai.edit', $slug));
});

// Home > Jabatan
Breadcrumbs::register('jabatan.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Jabatan', route('jabatan.index'));
});

// Home > Jabatan > [Jabatan]
Breadcrumbs::register('jabatan.show', function($breadcrumbs, $slug)
{
    $breadcrumbs->parent('jabatan.index');
    $breadcrumbs->push($slug, route('jabatan.show', $slug));
});

// Home > Jabatan > Create
Breadcrumbs::register('jabatan.create', function($breadcrumbs)
{
    $breadcrumbs->parent('jabatan.index');
    $breadcrumbs->push('Create Jabatan', route('jabatan.create'));
});

// Home > Edit Jabatan > [Jabatan]
Breadcrumbs::register('jabatan.edit', function($breadcrumbs, $slug)
{
    $breadcrumbs->parent('jabatan.index');
    $breadcrumbs->push('Edit Jabatan', route('jabatan.edit', $slug));
});

// Home > Disposisi
Breadcrumbs::register('disposisi.index', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Disposisi', route('disposisi.index'));
});

// Home > Disposisi > [Disposisi]
Breadcrumbs::register('disposisi.show', function($breadcrumbs, $slug)
{
    $breadcrumbs->parent('disposisi.index');
    $breadcrumbs->push($slug, route('disposisi.show', $slug));
});

// Home > Disposisi > Create
Breadcrumbs::register('disposisi.create', function($breadcrumbs)
{
    $breadcrumbs->parent('disposisi.index');
    $breadcrumbs->push('Create Disposisi', route('disposisi.create'));
});

// Home > Edit Disposisi > [Disposisi]
Breadcrumbs::register('disposisi.edit', function($breadcrumbs, $slug)
{
    $breadcrumbs->parent('disposisi.index');
    $breadcrumbs->push('Edit Disposisi', route('disposisi.edit', $slug));
});