<input class="form-text w-full rounded-lg" type="text" wire:model="code" placeholder="ex: R/BK/1">

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
                    <select class="form-select mt-1 block w-full rounded-md" name="start_year">
                        @php
                            $yearSelected = ' ';
                        @endphp
                        @for ($year = 2010; $year < 2025; $year++)
                            @if ($experiment->start_year == $year)
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

                <label class="block">
                    <span class="p-2 text-lg font-semibold text-gray-700">Year @extends('name')</span>
                    <select class="form-select mt-1 block w-full rounded-md" name="end_year">
                        @php
                            $yearSelected = ' ';
                        @endphp
                        @for ($year = 2010; $year < 2025; $year++)
                            @if ($experiment->end_year == $year)
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
