<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "fs_users".
 *
 * @property int $id
 * @property int|null $is_buyer
 * @property int|null $is_seller
 * @property string|null $auth_key
 * @property string|null $company_hvhh
 * @property string|null $legal_name
 * @property string|null $holding_hvhh
 * @property string|null $holding_legal_name
 * @property string|null $name
 * @property string|null $legal_address
 * @property string|null $address
 * @property string $email
 * @property string|null $phone
 * @property string $password
 * @property string|null $categories
 * @property string|null $image
 * @property string|null $link
 * @property string|null $company_description
 * @property int|null $verified
 * @property int|null $notify
 * @property string|null $created_at
 * @property string|null $active_date
 */
class FsUsers extends ActiveRecord implements IdentityInterface
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fs_users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['is_buyer', 'is_seller', 'verified', 'notify'], 'integer'],
            [['email', 'password'], 'required'],
            [['categories', 'created_at'], 'safe'],
            [['auth_key', 'company_hvhh', 'active_date','legal_name', 'holding_hvhh', 'holding_legal_name', 'name', 'legal_address', 'address', 'email', 'phone', 'password', 'image', 'link'], 'string', 'max' => 255],
            [['company_description'], 'string']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_buyer' => 'Is Buyer',
            'is_seller' => 'Is Seller',
            'auth_key' => 'Auth Key',
            'company_hvhh' => 'Company Hvhh',
            'legal_name' => 'Legal Name',
            'holding_hvhh' => 'Holding Hvhh',
            'holding_legal_name' => 'Holding Legal Name',
            'name' => 'Name',
            'legal_address' => 'Legal Address',
            'address' => 'Address',
            'email' => 'Email',
            'phone' => 'Phone',
            'password' => 'Password',
            'categories' => 'Categories',
            'image' => 'Image',
            'link' => 'Link',
            'company_description' => 'Company Description',
            'verified' => 'Verified',
            'notify' => 'Notify',
            'created_at' => 'Created At',
        ];
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    public static function findByUsername($username)
    {
        return static::findOne(['email' => $username]);
    }

    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function setPassword($password)
    {
        $this->password = Yii::$app->security->generatePasswordHash($password);
        return $this->password;
    }

    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function getBuyerRequests()
    {
        return $this->hasMany(FsRequests::class, ['buyer_id' => 'id'])->andFilterWhere(['fs_requests.status'=>[1,4]]);
    }

    public function getSellerRequests()
    {
        return $this->hasMany(FsRequests::class, ['seller_id' => 'id'])->andFilterWhere(['fs_requests.status'=>[1,4]]);
    }

    public function getBuyerPartners($search = '')
    {
        return $this->hasMany(FsUsers::class, ['id' => 'seller_id'])
            ->andFilterWhere(['like', 'legal_name', $search])
            ->via('buyerRequests');
    }
    public function getPartnersByCat($search = '',$category ='')
    {

        return $this->hasMany(FsUsers::class, ['id' => 'buyer_id'])
            ->andFilterWhere(['like', 'legal_name', $search])
            ->andFilterWhere(['like', 'categories', $category])
            ->via('sellerRequests');
    }
   public function getPartnersBayByCat($search = '',$category ='')
    {

        return $this->hasMany(FsUsers::class, ['id' => 'buyer_id'])
            ->andFilterWhere(['like', 'legal_name', $search])
            ->andFilterWhere(['like', 'categories', $category])
            ->via('buyerRequests');
    }

    public function getSellerPartners($search = '')
    {
        return $this->hasMany(FsUsers::class, ['id' => 'buyer_id'])
            ->andFilterWhere(['like', 'legal_name', $search])
            ->via('buyerRequests');
    }

    public function getCart()
    {
        return $this->hasMany(FsCart::class, ['user_id' => 'id'])->onCondition(['status' => 0]);
    }

    public function getNotifications()
    {
        return $this->hasMany(FsNotifications::class, ['recipient_id' => 'id'])->onCondition(['status' => 0]);
    }
    public function getAllNotifications()
    {
        return $this->hasMany(FsNotifications::class, ['recipient_id' => 'id']);
    }
//    public function getWishlist()
//    {
//        return $this->hasMany(FsWishlist::class, ['user_id' => 'id']);
//    }
    public function getWishlist()
    {
        return $this->hasMany(FsWishlist::class, ['user_id' => 'id']);
    }
    public function wishlist($id=0)
    {
        return $this->hasMany(FsWishlist::class, ['user_id' => 'id'])->onCondition(['provider_id' => $id])->asArray()->all();
    }

    public function getTemplates()
    {
        return $this->hasMany(FsTemplates::class, ['user_id' => 'id']);
    }
}
