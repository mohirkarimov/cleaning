<?php

namespace App\MoonShine\Resources;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use App\Models\Article;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Collapse;
use MoonShine\Decorations\Column;
use MoonShine\Decorations\Flex;
use MoonShine\Decorations\Grid;
use MoonShine\Decorations\Heading;
use MoonShine\Decorations\Tab;
use MoonShine\Decorations\Tabs;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\SlideField;
use MoonShine\Fields\Slug;
use MoonShine\Fields\Text;
use MoonShine\Fields\Textarea;
use MoonShine\Fields\TinyMce;
use MoonShine\Fields\Url;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;


class ArticleResource extends Resource
{
	public static string $model = Article::class;

	public static string $title = 'Статьи';

    public static string $subTitle = 'Хорошие статьи';

    public string $titleField = 'title';

   // public static array $activeActions = ['show'];


//    protected bool $editInModal = true;
//
//    protected bool $createInModal = true;

//
//    public static int $itemsPerPage = 5;
//
//    public static string $orderField = 'title';
//
//    public static string $orderType = 'DESC';
//
//    public function query(): Builder
//    {
//        return parent::query()->where('id',  '>' , 3);
//    }




    public function fields(): array
	{
		return [
		    ID::make()->sortable(),

            Grid::make([
                Column::make([
                    Block::make('Основная информация',[
                        Collapse::make('Заголовок/Slug' , [
                            Flex::make([
                                Text::make('Заголовок', 'title')
                                ->fieldContainer(false)
                                ->required(),

                                Slug::make('Slug' ,'Slug')
                                ->fieldContainer(false)
                                ->from('title')
                                ->separator('-')
                                ->unique(),



                            ]),
                        ]),
                        Tabs::make([
                            Tab::make('описание', [
                                TinyMce::make('Описание', 'description')
                                    ->hideOnIndex(),

                            ]),

                            Tab::make('Seo', [
                                Text::make('Seo Title')->hideOnIndex(),
                                Textarea::make('Seo description')->hideOnIndex(),
                            ]),

                        ]),


                        Url::make('link')
                        ->hideOnIndex()
                        ->expansion('https')
                        ->eye()
                        ->copy()
                        ->locked(),


//                        SlideField::make('Возрастное ограничение' , 'age')
//                            ->fromField('age_from')
//                        ->toField('age_to')
//                        ->min(0)
//                        ->max(75)
//                        ->step(1)





                    ]),

                ])->columnSpan(8),

                Column::make([

                    Block::make('Дополнительная информация',[
                    Image::make('Обложка', 'thumbnail')
                        ->removable()
                        ->multiple()
                        ->disk('public')
                        ->dir('articles'),
                        // ->allowedExtensions(['jpg', 'gif', 'png']),
//                        Tabs::make([
//
//                            Tab::make('Вкладка 1', [
//
//                                Heading::make('Заголовок'),
//                                Text::make('Заголовок', 'title')
//                                    ->hint('Подсказка')
//                                    ->addLink('Link', 'https://cutcode.dev')
//                                    ->required()
//                            ]),
//
//                            Tab::make('Вкладка 2', [
//                                Text::make('Заголовок', 'title')
//                                    ->hint('Подсказка')
//                                    ->addLink('Link', 'https://cutcode.dev')
//                                    ->required()
//                            ]),
//                        ]),

                    Number::make('Рейтинг','rating')
                        ->stars()
                        ->min(0)
                        ->max(5),


                    ]),



                ])->columnSpan(4)
            ]),




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
