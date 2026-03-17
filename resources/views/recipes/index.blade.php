@extends('layouts.app')

@section('title','All Recipes')

@section('content')
<h3>All Recipes</h3>

@if ($recipes->isEmpty())
    <p>No recipes yet. 
        @if(session()->has('logged_in'))
            <a href="{{ route('recipes.create') }}">Add</a>
        @else
            <span>Please login to add recipes.</span>
        @endif
    </p>
@else
    <table>
        <thead>
            <tr>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recipes as $recipe)
            <tr>
                <td>{{ $recipe->name }}</td>
                <td>
                    <a href="{{ route('recipes.show', $recipe) }}">View</a>
                    
                    @if(session()->has('logged_in'))
                        | <a href="{{ route('recipes.edit', $recipe) }}">Edit</a>
                        | <form action="{{ route('recipes.destroy', $recipe) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure?')" style="background: none; border: none; color: red; cursor: pointer; text-decoration: underline;">
                                Delete
                            </button>
                        </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endif
@endsection