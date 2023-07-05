<?php

namespace App\MoonShine\Resources;

 use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

 use MoonShine\Decorations\Block;
 use MoonShine\Fields\BelongsTo;
 use MoonShine\Fields\Text;
 use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class CategoryResource extends Resource
{
	public static string $model = Category::class;

	public static string $title = 'Category';

    public string $titleField = 'title';
    protected bool $createInModal = true;
    protected bool $editInModal = true;

	public function fields(): array
	{
		return [

		    Block::make([
                ID::make()->sortable(),
//                BelongsTo::make('Родительская категория' , 'category_id')
//                    ->nullable(),
                Text::make('Заголовок' , 'title')->required()

            ])
        ];
	}

	public function rules(Model $item): array
	{
	    return [];
    }

    public function search(): array
    {
        return ['id'];
    }

    public function filters(): array
    {
        return [];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
