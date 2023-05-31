<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
      {{ __('CONTENT MANAGEMENT SYSTEM') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <head>
      <!-- service.display.blade.php -->
      <link rel="stylesheet" href="{{ asset('css/ibmMain.css') }}">
      <link rel="stylesheet" href="{{ asset('css/cms.css') }}">
      <!-- Font-Awesome 5.15.3 -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    </head>

    <div class="dashboard">
      <section id="index" style="z-index:99999999999999;">
        <ul>
          <li><a href="#services">Services</a></li>
          <li><a href="#exploreTech">Explore Tech</a></li>
          <li><a href="#consult">Overview</a></li>
          <li><a href="#recentWorks">Recent Works</a></li>
          <li><a href="#ajsdfkk">Our Clients</a></li>
          <li><a href="#headerSe">Header Service</a></li>
          <li><a href="#headerPr">Header Product</a></li>
        </ul>
      </section>

      <br>

      <div>@include('cms.service.display')</div>
      <div>@include('cms.exploreTechs.modify')</div>
      <div>@include('cms.overviews.display')</div>
      <div>@include('cms.recentWorks.modify')</div>
      <div>@include('cms.ourClients.modify')</div>
      <div>@include('cms.headerServices.display')</div>
      <div>@include('cms.headerProducts.display')</div>
    </div>
    <!--dashboard -->
  </div>
</x-app-layout>