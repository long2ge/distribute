<?php
namespace App\Http\Controllers;


/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="L5 OpenApi",
 *      description="L5 Swagger OpenApi description",
 *      @OA\Contact(
 *          email="darius@matulionis.lt"
 *      ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://hema.com/"
 *     )
 * )
 *
 *  @OA\Server(
 *      url="http://hema.com/",
 *      description="L5 Swagger OpenApi dynamic host server",
 *     @OA\SecurityScheme(
 *     type="http",
 *     description="xxx sign",
 *     in="header",
 *     scheme="bearer"
 * )
 *  )
 *
 *  @OA\Server(
 *      url="http://haha.com/",
 *      description="3252345345436346"
 *  )
 *
 * @OA\SecurityScheme(
 *     type="oauth2",
 *     description="Use a global client_id / client_secret and your username / password combo to obtain a token",
 *     name="Password Based",
 *     in="header",
 *     scheme="https",
 *     securityScheme="Password Based",
 *     @OA\Flow(
 *         flow="password",
 *         authorizationUrl="/oauth/authorize",
 *         tokenUrl="/oauth/token",
 *         refreshUrl="/oauth/token/refresh",
 *         scopes={}
 *     )
 * )
 *
 * @OA\Tag(
 *     name="project",
 *     description="Everything about your Projects",
 *     @OA\ExternalDocumentation(
 *         description="Find out more",
 *         url="http://swagger.io"
 *     )
 * )
 * @OA\Tag(
 *     name="admin-member",
 *     description="Operations about user",
 *     @OA\ExternalDocumentation(
 *         description="Find out more about",
 *         url="http://swagger.io"
 *     )
 * )
 * @OA\ExternalDocumentation(
 *     description="Find out more about Swagger",
 *     url="http://swagger.io"
 * )
 *
 *
 */
class SwaggerController
{
    /**
     * @OA\Get(
     *      path="/projects/{id}",
     *      operationId="getProjectById",
     *      tags={"project"},
     *      summary="Get project information",
     *      description="Returns project data",
     *      @OA\Parameter(
     *          name="id",
     *          description="Project id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Parameter(
     *          name="test",
     *          description="test id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="successful operation"
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     *      security={
     *         {
     *             "oauth2_security_example": {"write:projects", "read:projects"}
     *         }
     *     },
     * )
     */

    /**
     * @OA\Get(
     *     path="/hello/{id}",
     *     @OA\Parameter(
     *       name="id",
     *       in="path",
     *       required=true,
     *       description="123123",
     *       @OA\Schema(type="integer")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="SUCCESS/成功",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *              @OA\Property(property="code", type="integer", format="int32", description="标识"),
     *              @OA\Property(property="msg", type="string", format="int32", description="描述"),
     *              @OA\Property(property="data",type="object",description="返回数据",
     *                 @OA\Property(property="no",type="string",description="版本号"),
     *                 @OA\Property(property="account",type="string",description="用户"),
     *                 @OA\Property(property="real_name",type="string",description="权限名称"),
     *             ),
     *         ),
     *         example={"code": 0,"msg": "success","data": {"no": "1.3","account": "admin","real_name": "god"}}
     *        )
     *     ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     *      security={
     *         {"api_key_security_example": {}}
     *     },
     * )
     */


    /**
     * @OA\Post(
     *     path="/hello/file-upload",
     *     tags={"admin-member"},
     *     summary="Upload one user document",
     *     description="Upload one user document",
     *     @OA\RequestBody(
     *      @OA\MediaType(mediaType="application/x-www-form-urlencoded",
     *          @OA\Schema(
     *              type="object",
     *              required={"file", "id", "type"},
     *              @OA\Property(property="file", type="string", format="binary", description="user document file"),
     *              @OA\Property(property="id", type="integer", description="user id"),
     *              @OA\Property(property="type", type="string", enum={"verification_file","id_card_file","credit_card_file"})
     *          )
     *      )),
     *     @OA\Response(
     *          response=200,
     *          description="successful operation"
     *     )
     * )
     */


    /**
     * @OA\Post(
     *     path="/hello/xx-yy",
     *     tags={"admin-sales-type"},
     *     summary="Store a newly created sales type item in storage",
     *     description="Store a newly created sales type item in storage",
     *     @OA\RequestBody(required=true, @OA\JsonContent(
     *           required={"sales_name", "handle_fee", "commission", "status", "visible", "keywords", "sales_name_abbr", "charge_full_domestic", "default", "tiers"},
     *           @OA\Property(property="sales_name", type="string", description="sales name"),
     *           @OA\Property(property="handle_fee", type="number", format="float", description="handle fee", example="15.00"),
     *           @OA\Property(property="status", type="integer", enum={1, 0}),
     *           @OA\Property(property="charge_full_domestic", type="integer", description="charge full domestic"),
     *           @OA\Property(property="default", type="string", enum={1, 0}),
     *           @OA\Property(property="tiers", type="array", description="tiers",
     *              @OA\Items(
     *                  @OA\Property(property="type", type="string", enum={"flat", "basic", "subtract", "platform"}),
     *                  @OA\Property(property="from", type="integer", description="from", example="0")
     *              )
     *          ),
     *     )),
     *     @OA\Response(
     *          response="200",
     *          description="successful operation"
     *      )
     * )
     */


    /**
     * @OA\Patch(
     *     path="/admin/member/{id}",
     *     tags={"admin-member"},
     *     summary="get member info",
     *     description="get member info",
     *     @OA\RequestBody(required=true, @OA\JsonContent(
     *           @OA\Property(property="name", type="string", description="user name"),
     *           @OA\Property(property="display_currency", type="string", enum={"USD","JPY"})
     *     )),
     *     @OA\Parameter(
     *      name="id", in="path", description="member id",
     *      required=true, @OA\Schema(type="integer")),
     *     @OA\Response(
     *          response=200,
     *          description="successful operation"
     *     )
     * )
     */


    /**
     * @OA\Delete(
     *     path="/hello/delete/{id}",
     *     tags={"admin-member"},
     *     summary="Remove the specified resource from storage",
     *     description="Remove the specified resource from storage",
     *     @OA\Parameter(
     *      name="id", in="path", description="member id",
     *      required=true, @OA\Schema(type="integer")),
     *     @OA\Response(
     *          response=200,
     *          description="successful operation"
     *     )
     * )
     */
}