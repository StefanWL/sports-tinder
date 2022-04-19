@extends('layouts.app')

@section('content')
    <div class="">
        <h1 class="heading-text fw-bold pb-3">{{ auth()->user()->name }} - Editing Profile</h1>
        <form action="{{ route('user.edit')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="fs-5">Pick Sports</div>   
            <div class="mb-4 d-flex flex-wrap justify-content-start">
                <div class="checkbutton-container me-4 mb-2">
                    <input type="checkbox" name="baseball" id="baseball" class="d-none" value="1" @checked($profile->baseball)/>
                    <label for="baseball" class="btn rounded-pill checkbutton heading-text">Baseball</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="checkbox" name="basketball" id="basketball" class="d-none" value="1" @checked($profile->basketball)/>
                    <label for="basketball" class="btn rounded-pill checkbutton heading-text">Basketball</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="checkbox" name="football" id="football" class="d-none" value="1" @checked($profile->football)/>
                    <label for="football" class="btn rounded-pill checkbutton heading-text">Football</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="checkbox" name="hockey" id="hockey" class="d-none" value="1" @checked($profile->hockey)/>
                    <label for="hockey" class="btn rounded-pill checkbutton heading-text">Hockey</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="checkbox" name="ultimate" id="ultimate" class="d-none" value="1" @checked($profile->ultimate)/>
                    <label for="ultimate" class="btn rounded-pill checkbutton heading-text">Ultimate</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="checkbox" name="soccer" id="soccer" class="d-none" value="1" @checked($profile->soccer)/>
                    <label for="soccer" class="btn rounded-pill checkbutton heading-text">Soccer</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="checkbox" name="bowling" id="bowling" class="d-none" value="1" @checked($profile->bowling)/>
                    <label for="bowling" class="btn rounded-pill checkbutton heading-text">Bowling</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="checkbox" name="sparring" id="sparring" class="d-none" value="1" @checked($profile->sparring)/>
                    <label for="sparring" class="btn rounded-pill checkbutton heading-text">Sparring</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="checkbox" name="cycling" id="cycling" class="d-none" value="1" @checked($profile->cycling)/>
                    <label for="cycling" class="btn rounded-pill checkbutton heading-text">Cycling</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="checkbox" name="running" id="running" class="d-none" value="1" @checked($profile->running)/>
                    <label for="running" class="btn rounded-pill checkbutton heading-text">Running</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="checkbox" name="golf" id="golf" class="d-none" value="1" @checked($profile->golf)/>
                    <label for="golf" class="btn rounded-pill checkbutton heading-text">Golf</label>
                </div>
                <div class="checkbutton-container me-4 mb-2">
                    <input type="checkbox" name="tennis" id="tennis" class="d-none" value="1" @checked($profile->tennis)/>
                    <label for="tennis" class="btn rounded-pill checkbutton heading-text">Tennis</label>
                </div>
            </div>
            <div class="mb-4">
                <label class="fs-5" for="skillLevel">Skill Level</label>
                <select name="skillLevel" id="skillLevel"
                class="w-100 p-3 rounded border border-dark @error('searchForable') border border-danger @enderror">
                    <option value="Beginner">Beginner</option>
                    <option value="Intermediate">Intermediate</option>
                    <option value="Experienced">Experienced</option>
                </select>
                @error('searchForable')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="mb-4">
                <label for="bio" class="fs-5">Bio</label>
                <textarea name="bio" id="bio" placeholder="Bio"
                class="w-100 p-3 rounded border border-dark @error('bio') border border-danger @enderror">{{ $profile->bio }}</textarea>

                @error('bio')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="fs-5">Profile Photo</div>   
            <div class="mb-4">
                <label id="image-label" class="file-upload-label" for="images[]">
                    <i class="fa-solid fa-plus fa-3x"></i>
                    <input type="file" id="images[]" name="images[]" class="file-upload" accept=".jpg,.jpeg,.png" />
                </label>
            
                @error('images')
                    <div class="text-danger mt-2">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn fs-5 rounded-pill purple heading-text w-100 mb-5">
                Update
            </button>
        </form>
    </div>
    <script src="/js/profile.js"></script>
@endsection