<div>
    <form wire:submit.prevent="save">
        <div class="row justify-content-md-center">
            <div class="mb-3 col-md-9">
                <label for="formFile" class="form-label">Select File to Compress (Max: 200MB)</label>
                <input class="form-control" type="file" id="formFile" wire:model="file">
                @error('file')
                    <span class="error text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="my-auto mx-2 col-md-auto">
                <button type="submit" class="btn btn-primary py-auto w-100" wire:loading.attr="disabled"
                    wire:target="file,save">
                    <span wire:loading.remove wire:target="save">Upload and Compress</span>
                    <span wire:loading wire:target="save">Processing...</span>
                </button>
            </div>
        </div>

        <div class="row justify-content-md-center">
            <div class="my-auto mx-2 col-md-auto">
                <div wire:loading wire:target="file">
                    <div class="spinner-border" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <span>Uploading and processing...</span>
                </div>

                @if ($downloadUrl)
                    <div class="mt-4">
                        <div class="d-flex justify-content-center">
                            <h4>File compressed successfully!</h4>
                        </div>
                        <div class="d-flex justify-content-center">
                            <a href="{{ $downloadUrl }}" target="_blank" class="btn btn-success">
                                Download Compressed File
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </form>
</div>