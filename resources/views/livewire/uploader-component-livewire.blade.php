<div>
    <ul class="nav nav-tabs nav-tabs-flat" id="myTab" role="tablist" data-aos="fade-up" data-aos-delay="100"
        wire:ignore.self>
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="image-tab" data-bs-toggle="tab" data-bs-target="#image" type="button"
                role="tab" aria-controls="image" aria-selected="true">Images</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="zip-tab" data-bs-toggle="tab" data-bs-target="#zip" type="button"
                role="tab" aria-controls="zip" aria-selected="false">Zip</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="pdf-tab" data-bs-toggle="tab" data-bs-target="#pdf" type="button"
                role="tab" aria-controls="pdf" aria-selected="false">PDF</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="minify-tab" data-bs-toggle="tab" data-bs-target="#minify" type="button"
                role="tab" aria-controls="minify" aria-selected="false">JS/CSS Minify</button>
        </li>
    </ul>
    <div class="tab-content" id="myTabContent" data-aos="fade-up" data-aos-delay="100" wire:ignore.self>
        <div class="tab-pane fade show active" id="image" role="tabpanel" aria-labelledby="image-tab">
            <div class="p-4">
                <form wire:submit.prevent="save">
                    <div class="row justify-content-md-center">
                        <div class="mb-3 col-md-9">
                            <label for="formFile" class="form-label">Select Image (Max: 200MB)</label>
                            <input class="form-control" type="file" id="formFile" wire:model="image">
                            @error('image')
                                <span class="error text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="my-auto mx-2 col-md-auto">
                            <button type="submit" class="btn btn-primary py-auto w-100" wire:loading.attr="disabled"
                                wire:target="image,save">
                                <span wire:loading.remove wire:target="save">Upload and Optimize</span>
                                <span wire:loading wire:target="save">Processing...</span>
                            </button>
                        </div>
                    </div>

                    <div wire:loading wire:target="image">
                        <div class="spinner-border" role="status">
                            <span class="visually-hidden">Loading...</span>
                        </div>
                        <span>Uploading and processing...</span>
                    </div>
                </form>

                @if ($downloadUrl)
                    <div class="mt-4">
                        <h4>Image processed successfully!</h4>
                        <a href="{{ $downloadUrl }}" target="_blank" class="btn btn-success">Download Optimized
                            Image</a>
                    </div>
                @endif
            </div>
        </div>
        <div class="tab-pane fade" id="zip" role="tabpanel" aria-labelledby="profile-tab">
            <h3>Coming Soon</h3>
        </div>
        <div class="tab-pane fade" id="pdf" role="tabpanel" aria-labelledby="pdf-tab">
            <h3>Coming Soon</h3>
        </div>
        <div class="tab-pane fade" id="minify" role="tabpanel" aria-labelledby="minify-tab">
            <h3>Coming Soon</h3>
        </div>
    </div>
</div>
