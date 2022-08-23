<?php

namespace App\Http\Livewire\Articles;

use App\Models\Article;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use App\Http\Livewire\CoreComponent;

class CreateUpdateArticleComponent extends CoreComponent
{
    use WithFileUploads;

    public $title, $image, $content, $updateMode = false, $slug;

    public function render()
    {
        // $this->dispatchBrowserEvent('contentChanged');

        return view('livewire.articles.create-update-article-component')->with('updateMode', $this->updateMode)->layout('layouts.app');
    }

    public function mount($slug = NULL)
    {

        $this->slug = $slug;

        $article = Article::find($slug);

        if (!$article) {
            return;
        } else {
            $this->updateMode = true;
            $this->title = $article->title;
            $this->image = $article->image;
            $this->content = $article->content;
            $this->slug = $article->slug;
        }
    }

    private function resetInputFields()
    {
        $this->title = '';
        $this->content = '';
        $this->image = '';
    }

    public function store()
    {

        $validatedData = $this->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
        ]);

        // $this->dispatchBrowserEvent('contentChanged');

        $slug = Str::slug($validatedData['title']);

        $validatedData['slug'] = $slug;

        $exists = Article::where('slug', $slug)->exists();

        if ($exists) {
            $this->alertError("Error Saving Article. Article Title's Must Be Unique");
        }

        //
        $validatedData['image'] = $this->storeImage($validatedData['image'], "articles");

        Article::create($validatedData);

        $this->resetInputFields();

        $this->alertSuccess("Article Saved");

        $this->dispatchBrowserEvent('contentChanged');
    }

    public function cancel()
    {
        return redirect()->route('articles');
        // $this->updateMode = false;
        // $this->resetInputFields();
    }

    public function update()
    {
        $validatedData = $this->validate([
            'title' => ['required
            ', 'string', 'max:255', Rule::unique('articles', 'title')->ignore($this->title)],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'content' => 'required|string',
        ]);

        $article = Article::whereSlug('slug', $this->slug)->first();

        if (isset($validatedData['image'])) {
            $validatedData['image'] = $this->storeImage($validatedData['image'], "articles");
        }

        $slug = Str::slug($validatedData['title']);

        $validatedData['slug'] = $slug;

        $article->update($validatedData);

        $this->alertSuccess("Article Updated");
        $this->updateMode = false;
    }
}
