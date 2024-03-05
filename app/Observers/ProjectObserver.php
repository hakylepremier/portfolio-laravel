<?php

namespace App\Observers;

use App\Models\Project;
use Illuminate\Support\Facades\Storage;

class ProjectObserver
{
    /**
     * Handle the Project "created" event.
     */
    public function created(Project $project): void
    {
        //
    }

    /**
     * Handle the Project "updated" event.
     */
    public function updated(Project $project): void
    {
    }

    public function saved(Project $project): void
    {
        if ($project->isDirty('photo')) {

            $originalPhotos = $project->getOriginal('photo');
            $newPhotos = $project->photo;

            # We attempt to JSON decode the field. If it is an array, this is an indication we have ->multiple() activated
            if (is_array($originalPhotos)) {
                $originalPhotosDecoded = $originalPhotos;
            } else {
                $originalPhotosDecoded = json_decode($originalPhotos);
            }

            if ($originalPhotos) {
                # code...
                # Clean up empty entries in the resulting array
                if (is_array($originalPhotosDecoded)) $originalPhotosDecoded = array_filter($originalPhotosDecoded);

                # Simple case: one file 
                if (!is_array($originalPhotosDecoded) or count($originalPhotosDecoded) == 0) {
                    Storage::disk('public')->delete($originalPhotos);
                }
                # Complex case: multiple files
                else {
                    foreach ($originalPhotosDecoded as $originalPhoto) {
                        if (trim($originalPhoto) != null && !in_array($originalPhoto, $newPhotos)) {
                            Storage::disk('public')->delete($originalPhoto);
                        }
                    }
                }
            }
        }
    }

    /**
     * Handle the Project "deleted" event.
     */
    public function deleted(Project $project): void
    {
        if (!is_null($project->photo)) {

            # We attempt to JSON decode the field. If it is an array, there are multiple files
            if (is_array($project->photo)) {
                $photosDecoded = $project->photo;
            } else {
                $photosDecoded = json_decode($project->photo);
            }

            # Simple case: one file 
            if (!is_array($photosDecoded)) {
                Storage::disk('public')->delete($project->photo);
            }

            # Complex case: multiple files
            else {

                foreach ($photosDecoded as $photo) {
                    Storage::disk('public')->delete($photo);
                }
            }
        }
    }

    /**
     * Handle the Project "restored" event.
     */
    public function restored(Project $project): void
    {
        //
    }

    /**
     * Handle the Project "force deleted" event.
     */
    public function forceDeleted(Project $project): void
    {
        //
    }
}
