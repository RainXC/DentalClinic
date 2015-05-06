<?php namespace LaravelRU\Articles\Repositories;

use LaravelRU\Core\Models\Version;
use LaravelRU\Core\Repositories\AbstractRepository;
use LaravelRU\Articles\Models\Article;

class ArticleRepo extends AbstractRepository {

	public function __construct(Article $article)
	{
		$this->model = $article;
	}

	/**
	 * ID автора поста
	 *
	 * @param int $article_id
	 * @return int
	 */
	public function getAuthorId($article_id)
	{
		$author_id = $this->model->where('id', $article_id)->pluck('author_id');

		return $author_id;
	}

	/**
	 * Получить пост по урлу
	 *
	 * @param $slug
	 * @return \Illuminate\Database\Eloquent\Model|null
	 */
	public function getBySlug($slug)
	{
		$article = $this->model->where('slug', $slug)->with('author')->withComments()->firstOrFail();

		return $article;
	}

	/**
	 * Последние посты
	 *
	 * @param int $num
	 * @return \Illuminate\Database\Eloquent\Collection|static[]
	 */
	public function getLastArticles($num = 10)
	{
		return $this->model->notDraft()->withAuthor()->orderByDatePublished()->limit($num)->get();
	}

	/**
	 * Get the latest articles and paginate them
	 *
	 * @param int $num
	 * @return mixed
	 */
	public function getArticlesAndPaginate($num = 15)
	{
		return $this->model->notDraft()->withAuthor()->withComments()->orderByDatePublished()->paginate($num);
	}

	/**
	 * html-селектор выбора версии фрейворка в посте
	 */
	public function getFrameworkVersionSelect($currentFrameworkVersion)
	{
		$allVersions = Version::all();
	}

}
