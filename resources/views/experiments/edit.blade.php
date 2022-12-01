@extends('layouts.app')
@section('content')
    <form action="/experiments/{{ $experiment->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header sticky top-0  bg-blue-600 text-center">
                <div class="flex flex-row items-center justify-between">
                    <div class="basis-3/4 p-3">
                        <h1 class="text-bold justify-center p-4 text-3xl text-slate-100">Edit : {{ $experiment->id }} -
                            {{ $experiment->name }}
                        </h1>
                    </div>
                    <div class="basis-1/4 p-3">
                        <a class="text-grey-400 float-right m-2 inline-block transform rounded-lg bg-blue-500 px-5 py-3 text-sm font-semibold uppercase tracking-wider shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-2 active:bg-blue-900"
                            href="/datasets/{{ $dataset->id }}">Cancel</a>
                        <button
                            class="float-right m-2 inline-block transform rounded-lg bg-blue-500 px-5 py-3 text-sm font-semibold uppercase tracking-wider text-white shadow-lg transition hover:-translate-y-0.5 hover:bg-blue-400 focus:outline-none focus:ring focus:ring-blue-500 focus:ring-opacity-50 focus:ring-offset-2 active:bg-blue-900"
                            type="submit">Submit</button>
                    </div>
                </div>
            </div>
            <div class="card-body">

                    <input class="form-text w-full rounded-lg" type="text" wire:model="name"
                        placeholder="Name of the experiment">

                    <input class="form-text w-full rounded-lg" type="text" wire:model="code"
                        placeholder="ex: R/BK/1">

                    <input class="form-text w-full rounded-lg" type="text" wire:model="glten_id"
                        placeholder="Please enter the ID on GLTEN">

                    <input class="form-text w-full rounded-lg" type="text" wire:model="key_ref_code"
                        placeholder="Please enter endnote keyRef">

                    <select class="form-select w-full rounded-lg" wire:model="field_id">
                        @foreach ($fields as $field)
                            <option value="{{ $field->id }}">{{ $field->name }}
                            </option>
                        @endforeach
                    </select>
                    <label class="block">
                        <span class="p-2 text-lg font-semibold text-gray-700">Year Start</span>
                        <select class="form-select mt-1 block w-full rounded-md" name="publication_year">
                            @php
                                $yearSelected = ' ';
                            @endphp
                            @for ($year = 2010; $year < 2025; $year++)
                                @if ($dataset->publication_year == $year)
                                    @php
                                        $yearSelected = ' selected';
                                    @endphp
                                @else
                                    @php
                                        $yearSelected = ' ';
                                    @endphp
                                @endif
                                <option value="{{ $year }}" {{ $yearSelected }}>{{ $year }}
                                </option>
                            @endfor
                        </select>
                    </label>

                    <button
                        class="disable:cursor-not-allowed rounded bg-indigo-500 py-2 px-4 text-white hover:bg-indigo-500 disabled:bg-opacity-10"
                        wire:click.prevent="addExpt">Add</button>
                </td>
            </tr>
        </table>

    </div>
</div>
